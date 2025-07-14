<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->where('author_id', Auth::user()->id);

        $keyword = request('keyword');

        if ($keyword) {
            $posts->where('title', 'like', '%' . $keyword . '%');
        }

        return view('dashboard.index', ['posts' => $posts->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:posts|min:4|max:255',
        //     'category_id' => 'required',
        //     'description' => 'required',
        // ]);

        Validator::make($request->all(), [
            'title' => 'required|unique:posts|min:4|max:255',
            'category_id' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Field title harus diisi',
            'category_id.required' => 'Field category harus diisi',
            'description.required' => 'Field description harus diisi',
        ])->validate();

        Post::create([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'slug' => Auth::user()->username . '-' . Str::slug($request->title),
            'description' => $request->description,
        ]);

        return redirect('/dashboard')->with(['success' => 'Your post ' . $request->title . ' has been saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('dashboard.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //validation
        $request->validate([
            'title' => 'required|min:4|max:255|unique:posts,title' . $post->id, // agar saat edit dan tidak ingin ada perubahan pada title
            'category_id' => 'required',
            'description' => 'required',
        ]);

        //update
        $post->update([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ]);

        //routes
        return redirect('/dashboard')->with(['success' => 'Your post has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // return $post;
        $post->delete();

        return redirect('/dashboard')->with(['success' => 'Your post has been removed!']);
    }
}
