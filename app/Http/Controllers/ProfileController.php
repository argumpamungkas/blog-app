<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        // dd($request->all());

        $validated = $request->validated();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Versin LARAVEL
        // if ($request->hasFile('avatar')) {
        //     // cek apakah di folder ada foto sebelumnya ?
        //     if (!empty($request->user()->avatar)) {
        //         Storage::disk('public')->delete($request->user()->avatar);
        //     }

        //     $path = $request->file('avatar')->store('img', 'public');
        //     $validated['avatar'] = $path;
        // }

        // VERSI FILEPOND
        if ($request->avatar) { // cek apakah ada avatar
            if (!empty($request->user()->avatar)) {
                Storage::disk('public')->delete($request->user()->avatar);
            }

            $newFileName = Str::after($request->avatar, 'tmp/');

            // pindahkan file dari tmp ke public
            Storage::disk('public')->move($request->avatar, "img/$newFileName");

            // nama file yang di save didb;
            $validated['avatar'] = "img/$newFileName";
        }

        // $request->user()->save();
        $request->user()->update($validated);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function upload(Request $request)
    {
        // simpen sementara ke tmp
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('tmp', 'public');
        }

        return $path;
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
