<x-layout :title='$title'>

    {{-- <article class="py-8 max-w-screen-md border-b-2 border-gray-200">
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
    </article> --}}

    <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/posts" class=" text-xs text-blue-500 font-medium hover:underline">&leftarrow; Back to All
                    Blog</a>
                <header class="mb-4 lg:my-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <a href="/posts?category={{ $post->category->slug }}" class="block my-1"><span
                                        class="{{ $post->category->color }} text-gray-400 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span> </a>
                                <p class="text-base text-gray-500 dark:text-gray-400"><span
                                        class="text-sm">{{ $post->created_at->diffForHumans() }}</span></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                <p>{{ $post->description }}</p>
            </article>
        </div>
    </main>

</x-layout>
