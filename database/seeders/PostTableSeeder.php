<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['id'=>1,'title'=>'Post One','description'=>'Description One','status'=>'1'],
            ['id'=>2,'title'=>'Post Two','description'=>'Description Two','status'=>'0'],
            ['id'=>3,'title'=>'Post Three','description'=>'Description Three','status'=>'0'],
        ];
        Post::insert($posts);
    }
}
