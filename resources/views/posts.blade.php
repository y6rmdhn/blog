<x-layout>
    <x-slot:title>{{ $title }}</x-slot:>
        @foreach ($posts as $post)
            <article class="text-white max-w-screen-md py-8 border-b border-gray-300">
                <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                    <h2 class="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
                </a>
                <div class="text-base text-gray-500">
                    by <a href="/authors/{{ $post->author->name }}" class="hover:underline">{{ $post->author->name }}</a>
                    in <a href="/categories/{{ $post->category->slug }}"
                        class="hover:underline">{{ $post->category->name }}</a> |
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="my-4 font-light">
                    {{ Str::limit($post['body'], 200) }}
                </p>
                <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more
                    &raquo;</a>
            </article>
        @endforeach

</x-layout>
