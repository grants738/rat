<?php

use App\Email;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmailTest extends TestCase
{

	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEmail()
    {
        $response = $this->post('/email',['email' => 'something@something.com']);

        $response->assertSessionHas('success');

        Email::truncate();
    }
}
