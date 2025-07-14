<x-layout :title='$title'>

    {{-- @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b-2 border-gray-200">
            <a href="/posts/{{ $post->slug }}">
                <h2 class="mb- text-3xl tracking-tight font-bold text-gray-900 hover:underline">{{ $post->title }}</h2>
            </a>
            <div class="text-base text-gray-500 font-medium mb-4">
                By <a href="/authors/{{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a>
                in <a href="/categories/{{ $post->category->slug }}"
                    class="hover:underline">{{ $post->category->name }}</a>
                |
                {{ $post->author->created_at->format('d F Y') }}
            </div>
            <p class="font-light mb-4">
                {{ Str::limit($post->description, 120) }}
            </p>
            <a href="/posts/{{ $post->slug }}" class="text-blue-500 font-medium hover:underline">Read More
                &rightarrow;</a>
        </article>
    @endforeach --}}


    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

        {{-- SEARCH --}}
        <form class="mb-8 max-w-md mx-auto">
            {{-- Penggunaan untuk jika kita berada pada page category/author --}}
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @elseif (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif

            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search post title..." autofocus autocomplete="off" name="search" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        {{-- PAGINATION --}}
        {{ $posts->links() }}

        {{-- CARD --}}
        <div class="grid gap-8 mt-2 md:grid-cols-2 lg:grid-cols-3 ">
            @forelse ($posts as $post)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        {{-- <a href="/categories/{{ $post->category->slug }}"><span --}}
                        <a href="/posts?category={{ $post->category->slug }}"><span
                                class="{{ $post->category->color }} text-gray-400 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                            href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                        {{ Str::limit($post->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="/posts?author={{ $post->author->username }}">
                            <div class="flex text-xs items-center space-x-4">
                                <img class="w-7 h-7 rounded-full"
                                    src="{{ $post->author->avatar ? asset($post->author->avatar) : asset('img/avatar.jpg') }}"
                                    alt="{{ $post->author->name }}" />
                                <span class="font-medium dark:text-white">
                                    {{ $post->author->name }}
                                </span>
                            </div>
                        </a>
                        <a href="/posts/{{ $post->slug }}"
                            class="inline-flex text-xs items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class=" col-start-2 text-center">
                    <img class="mx-auto my-2"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD3UlEQVR4nO1ZzYsUVxB/Oag3BTEqxICaU4Qcg5qo56gnwbgGAyb5BwQTUQSjNxVzDeQWV0MQ8RKV3He95GPcqeqump2u6kH8uJjkomE10d1MqO7Xu8My48zsdM/OyPzgQbNdU+/99tV3OzfCCIMHonsbgeULJBkHkrtA+heyvkgW6Z9AUrJ3ZZLPg6C2wQ0akKM9yHoLWV8ia73DZbI3kaPdy31+F4byDpD8PH84klkgnQDS48DRdoB4falUWmHLnrEiO4D0SyCdNNmF3+ntIIi2LguJgOQIsP6dHkZmkPX8lMibnf7eiAHrBSR5ZjqA9ClS9Emxp14EIPm64RaulaPoLbdEIMomYL2e6QOSM0vV1RWQ9Zzf8D97rtfrb+SjV44ByVxfyAQkR/xGc0hyMHf9rB/Pk6nEh11hju19IiA5WaDZnsp8BqrVLUVskEYnkmuuQJipNvjMrSLyhJF4Fob6tisYFjx8JKwD1XblptgnO/sPnXd9QhKaWevA8lNuZUeShUlmW+WJciXaj6SPgPUhcry3nc5O5JMESknSfGHPPRNJaqfU+SZay9iBfB5gedBeZ2fyyHInNenos144pMpIxj2R470erFt5YP0qldHve+GQKiO5m2xakR2tZMw87HB2KCD9qJ3OTuXDUD/wZH93vcKX4vVu6qi8EAS1Db6o/KNnZcD6rykjopWuzxCRVd6s/3ldiDx9LUwLWOO+OHtRKIfxh77fudOX8LsYUyTbgPRbJInSUkNmgLRqfwvD6N1O9YAPv8j63ZIJNEmIk+1kS7XaGiS54nuVpr168o5k3GTb6UOfEMuV+EBedpqUKO1KBYv3C22rXLK+nYjW2rJnZPkmeddBbmgsUX4RWe3yQDrtSJzuQjsi5lPl6enNLWWq1S1IOoUsv71SF+lFv+ePLi8EFd3pzeJ5P8t4MDOcrr2Xq/KslLemJ68+vRlMN7LeyPZyecNMYt6+SU65goCsp33IfVzYNNLmTtnwwQYFeesvsx4y3WZSAcf7XJGwUU1Gxm4mDzPz5nQ6m6AkEZJ1zBWNjExmxzZkW6ouCx6ZTyyeDUNfyFTiw5nP2FDCQnM3LWkyMiW9aJHQl+pPmgzBX/aHjOWEhcFENsSetNLCmiJzVquabdlz2ihFJ5KM3TDEBtYf0k8SOrZsZAw2srFpRzefFazHQNKrU2HtfdeAZSezUFbER4HlclKu2MedpJ+RGWC5j6y/WuFohypVq+tcCwwEmbxgs2VcTIZktszyqRs24IjMgAJHNzOgwNHNDCigSZ6xD7RuGIENZgYkZ90wA1jHhvYmRnBDiv8BEh3gvv7vLgkAAAAASUVORK5CYII="
                        alt="nothing-found">
                    <p class="text-gray-300 font-semibold text-2xl">
                        Article {{ request('search') }} not found</p>
                    @if (request('category') || request('author'))
                        <a href="/posts?{{ request('category') ? 'category=' . request('category') : 'author=' . request('author') }}"
                            class="text-blue-500 hover:underline">&LeftArrow; Back to Post</a>
                    @else
                        <a href="/posts" class="text-blue-500 hover:underline">&LeftArrow; Back to All Post</a>
                    @endif
                </div>
            @endforelse

        </div>
    </div>

</x-layout>
