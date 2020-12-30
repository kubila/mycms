<?php

use App\Models\Author;
use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use App\User;
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
        factory(User::class, 1)->create();
        factory(Tag::class, 600)->create();
        factory(News::class, 100)->create();
        factory(Category::class, 20)->create();
        factory(Author::class, 20)->create();
        factory(Post::class, 150)->create();
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
        ]);
        DB::table('post_tags')->insert([
            'post_id' => Post::all()->pluck('id')->random(),
            'tags_id' => Tag::all()->pluck('id')->random(),
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
