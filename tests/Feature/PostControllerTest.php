<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PostControllerTest extends TestCase
{

    /**
     * Test for PostController@index method.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/posts');
        $data = DB::table('posts')->pluck('id')->get();
        $response->assertStatus(200)
            ->assertJson($data);
    }

    /**
     * Test for PostController@show method.
     *
     * @return void
     */
    public function testShow()
    {
        $id = DB::table('posts')->pluck('id')->first();
        $response = $this->get('/show/' . $id);
        $data = DB::table('posts')->pluck('id')->first();
        $response->assertStatus(200)
            ->assertJson($data);
    }
}
