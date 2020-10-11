<?php

use App\Models\Author;
use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use App\Models\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Tags::class, 30)->create();
        factory(News::class, 30)->create();
        factory(Category::class, 10)->create();
        factory(Author::class, 10)->create();
        factory(Post::class, 30)->create();
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);
    }
}
