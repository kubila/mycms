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
        factory(News::class, 600)->create();
        factory(Category::class, 30)->create();
        factory(Author::class, 30)->create();
        factory(Post::class, 1000)->create();
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
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tags::all()->pluck('id')->random(),
        ]);

        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);
        DB::table('category_news')->insert([
            'category_id' => Category::all()->pluck('id')->random(),
            'news_id' => News::all()->pluck('id')->random(),
        ]);

    }
}
