<x-layout>
    <x-slot:title>{{ $title }}</x-slot:>

        <article class="text-white max-w-screen-md py-8">
            <h2 class="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500">
                by <a href="/authors/{{ $post->author->name }}" class="hover:underline">{{ $post->author->name }}</a>
                in <a href="/categories/{{ $post->category->slug }}"
                    class="hover:underline">{{ $post->category->name }}</a> |
                {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ $post['body'] }}
            </p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline">&raquo; Back to
                posts</a>
        </article>

</x-layout>
