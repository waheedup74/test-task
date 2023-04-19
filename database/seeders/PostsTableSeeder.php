<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $user1 = User::find(1);

        $user1->posts()->createMany([
            [
                'title' => 'My first post',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                'title' => 'My second post',
                'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ],
        ]);

        $user2 = User::find(2);

        $user2->posts()->createMany([
            [
                'title' => 'Another post',
                'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
        ]);
    }
}
