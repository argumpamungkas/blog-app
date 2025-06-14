<x-layout :title='$title'>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b-2 border-gray-200">
            <h2 class="mb- text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500 font-medium mb-4">
                <a href="">{{ $post['author'] }}</a> | {{ $post['date'] }}
            </div>
            <p class="font-light mb-4">
                {{ Str::limit($post['description'], 100) }}
            </p>
            <a href="" class="text-blue-500 font-medium hover:underline">Read More &rightarrow;</a>
        </article>
    @endforeach

</x-layout>
