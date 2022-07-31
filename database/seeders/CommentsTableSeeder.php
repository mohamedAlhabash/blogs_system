<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = collect(User::where('id','>','2')->get()->modelKeys());
        $posts = collect(Post::wherePostType('post')->whereStatus('1')->whereCommentAble('1')->get());
    for($i=0 ; $i<100 ; $i++){
        Comment::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'url' =>$faker->url,
            'ip_address' => $faker->ipv4,
            'comment' => $faker->paragraph(2 ,true),
            'status' => rand(0 ,1),
            'post_id' => $posts->random()->id,
            'user_id' => $users->random(),
        ]);
    }
    }
}
