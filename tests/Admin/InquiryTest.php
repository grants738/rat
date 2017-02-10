<?php

use App\User;
use App\Inquiry;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InquiryTest extends TestCase
{
     /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetInquiries()
    {
        $user = User::find(1);
        $this->actingAs($user)
        	 ->visit('/admin/inquiries')
        	 ->see('Inquiries');
    }
}
