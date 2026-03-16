<x-layout>
    <x-slot:title>{{ $title }}</x-slot:>

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

                {{-- Bagian Header Judul --}}
                <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                        {{ $title }}
                    </h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                        Kumpulan artikel terbaru dari para penulis hebat kami.
                    </p>
                </div>

                {{-- Grid Container untuk Postingan --}}
                <div class="grid gap-8 lg:grid-cols-2">

                    {{-- Looping Data dari Database --}}
                    @foreach ($posts as $post)
                        <article
                            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                            {{-- Kategori & Waktu --}}
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                                <a href="/categories/{{ $post->category->slug }}">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hover:underline">
                                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                            </path>
                                        </svg>
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                                <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            </div>

                            {{-- Judul Artikel --}}
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <a href="/posts/{{ $post->slug }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            {{-- Isi Singkat (Excerpt) --}}
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                {{ Str::limit($post->body, 150) }}
                            </p>

                            {{-- Profil Penulis & Tombol Read More --}}
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    {{-- Men-generate avatar otomatis berdasarkan nama menggunakan ui-avatars --}}
                                    <img class="w-7 h-7 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name) }}&background=random"
                                        alt="{{ $post->author->name }}" />
                                    <span class="font-medium dark:text-white">
                                        <a href="/authors/{{ $post->author->username }}" class="hover:underline">
                                            {{ $post->author->name }}
                                        </a>
                                    </span>
                                </div>
                                <a href="/posts/{{ $post->slug }}"
                                    class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
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
                    @endforeach

                </div>
            </div>
        </section>
</x-layout>
