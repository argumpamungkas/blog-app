<x-layout :title='$title'>

    <article class="py-8 max-w-screen-md border-b-2 border-gray-200">
        <h2 class="mb- text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
        <div class="text-base text-gray-500 font-medium mb-4">
            <a href="/authors/{{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a> |
            {{ $post->author->created_at->format('d F Y') }} |
            {{ $post->category->name }}
        </div>
        <p class="font-light mb-4">
            {{ $post->description }}
        </p>
        <a href="/posts" class="text-blue-500 font-medium hover:underline">&leftarrow; Back to All Blog</a>
    </article>

</x-layout>
