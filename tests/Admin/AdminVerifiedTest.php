<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminVerifiedTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdminVerifiedWorks()
    {
        $user = User::find(1);
        $this->actingAs($user)
        	 ->visit('/admin')
        	 ->see('Dashboard');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdminNotVerifiedWorks()
    {
        $user = User::find(2);
        $this->actingAs($user)
        	 ->visit('/admin')
        	 ->see('Your Admin Account Has Not Been Verified Yet');
    }
}
