<?php

use App\User;
use App\Inquiry;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{

	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->visit('/contact')
        	  ->see('Contact Us');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewContact()
    {
        $this->post('/contact', [
        	'name' => 'John Doe',
        	'email' => 'something@something.com',
        	'message' => 'This is a test.',
        	'copy' => false
        ])->assertSessionHas('success');

        $user = User::find(1);
        $this->actingAs($user)
        	 ->visit('/admin/inquiries')
        	 ->see('This is a test.');

       	Inquiry::truncate();
    }

}
