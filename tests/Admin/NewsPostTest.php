<?php

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsPostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewPost()
    {
        $user = User::find(1);
        $this->actingAs($user)
        	 ->post('/admin/news', [
        	 	'title' => 'Test',
        	 	'body' => 'This is a test.'
        	 ]);

        $this->visit('/news')
        	 ->see('This is a test.');

       	Post::truncate();
    }
}
