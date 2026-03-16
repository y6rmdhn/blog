<x-layout>
    <x-slot:title>{{ $title }}</x-slot:>

        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                {{-- Tambahkan class 'format' untuk styling otomatis dari Flowbite Typography --}}
                <article
                    class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">

                        {{-- Tombol Back --}}
                        <a href="/posts"
                            class="inline-flex items-center mb-6 font-medium text-sm text-blue-600 hover:underline dark:text-blue-500">
                            &laquo; Back to all posts
                        </a>

                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                {{-- Avatar Penulis Dinamis --}}
                                <img class="mr-4 w-16 h-16 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name) }}&background=random"
                                    alt="{{ $post->author->name }}">
                                <div>
                                    {{-- Nama Penulis --}}
                                    <a href="/posts?author={{ $post->author->username }}" rel="author"
                                        class="text-xl font-bold text-gray-900 dark:text-white hover:underline">
                                        {{ $post->author->name }}
                                    </a>
                                    {{-- Kategori Artikel --}}
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        in <a href="/posts?category={{ $post->category->slug }}"
                                            class="hover:underline text-blue-600">{{ $post->category->name }}</a>
                                    </p>
                                    {{-- Waktu Pembuatan --}}
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        <time pubdate datetime="{{ $post->created_at->toDateString() }}"
                                            title="{{ $post->created_at->format('F jS, Y') }}">
                                            {{ $post->created_at->diffForHumans() }}
                                        </time>
                                    </p>
                                </div>
                            </div>
                        </address>

                        {{-- Judul Artikel --}}
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $post->title }}
                        </h1>
                    </header>

                    {{-- Isi Artikel --}}
                    {{-- Karena data di database kamu masih teks biasa, kita langsung tampilkan saja --}}
                    <p class="lead">{{ $post->body }}</p>

                    {{-- 
                    Catatan: 
                    Kalau nanti kamu memakai editor teks (seperti CKEditor atau Trix) yang menyimpan format HTML ke database, 
                    ganti baris di atas menjadi: 
                    {!! $post->body !!}
                --}}

                </article>
            </div>
        </main>

        {{-- 
        Kamu bisa menempelkan bagian <aside> (Related articles), <section> (Newsletter), 
        dan <footer> statis dari Flowbite di bawah sini jika kamu ingin menampilkannya di halaman ini. 
    --}}
</x-layout>
