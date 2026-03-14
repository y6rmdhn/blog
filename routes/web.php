<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', ['title' => 'Homepage']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Yopan Ramadhan',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic officia ut illum odio repellat eveniet quibusdam porro quae, praesentium nobis voluptatem quam, error est tenetur possimus culpa, id quaerat eius?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Yopan Ramadhan',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam neque nobis unde commodi sit veritatis amet voluptate quod est vero facere tempore, ad fuga dolore porro facilis. Cupiditate, ullam! Ipsam, esse dolore? Perspiciatis vero quos animi aperiam expedita voluptates distinctio omnis modi laudantium molestias fugiat, saepe aliquid accusantium minima iste assumenda quia sit nulla unde aut harum quisquam accusamus dolorum est! Quibusdam ea labore quia corporis, hic excepturi nemo optio.'
        ]
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Yopan Ramadhan',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic officia ut illum odio repellat eveniet quibusdam porro quae, praesentium nobis voluptatem quam, error est tenetur possimus culpa, id quaerat eius?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Yopan Ramadhan',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam neque nobis unde commodi sit veritatis amet voluptate quod est vero facere tempore, ad fuga dolore porro facilis. Cupiditate, ullam! Ipsam, esse dolore? Perspiciatis vero quos animi aperiam expedita voluptates distinctio omnis modi laudantium molestias fugiat, saepe aliquid accusantium minima iste assumenda quia sit nulla unde aut harum quisquam accusamus dolorum est! Quibusdam ea labore quia corporis, hic excepturi nemo optio.'
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
