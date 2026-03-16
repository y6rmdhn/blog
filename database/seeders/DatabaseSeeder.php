<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $fira = User::create([
            'name' => 'Maghfira',
            'username' => 'Firaa imup',
            'email' => 'fir.mr@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos architecto et unde obcaecati, iusto nulla quis quia at suscipit, impedit dolorum, nihil possimus necessitatibus illum magni nisi fugiat! Nisi, sint aliquid laudantium eum sequi nulla veritatis voluptas excepturi soluta officia. Eveniet id voluptate tenetur deserunt, non mollitia numquam quaerat exercitationem! Consectetur quaerat in debitis similique labore optio laboriosam quod cumque repellendus nisi cupiditate fugiat amet suscipit, nostrum nulla quidem odio hic officiis voluptatibus sit? Obcaecati, reiciendis itaque. Doloribus provident itaque, at recusandae dignissimos sequi ad unde sit consequuntur nam eos! Mollitia a, rem quasi magnam voluptas qui autem deserunt voluptatibus?'
        // ]);

        Post::factory(20)->recycle([
            Category::factory(3)->create(),
            $fira,
            User::factory(5)->create(),
        ])->create();
    }
}
