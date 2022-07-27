<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //DB::table('users')->where('id','>','2')->get()->modelKeys()
    public function run()
    {
        $faker = Factory::create();
        $categories = collect(Category::all()->modelKeys());
        $users = collect(User::Where('id','>','2')->get()->modelKeys());
    for($i=0 ; $i<100 ; $i++){
        Post::create([
            'title'        => $faker->sentence(mt_rand('3','6'),'true'),
            'description'  => $faker->paragraph,
            'status'       => rand(0, 1),
            'comment_able' => rand(0, 1),
            'user_id'      => $users->random(),
            'category_id'  => $categories->random(),
        ]);
    }
}
}
