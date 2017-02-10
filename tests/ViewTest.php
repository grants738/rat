<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Eagle Application Team');
    }

    /**
     * Test to see if home page is returned
     *
     * @return void
     */
    public function testApps()
    {
        $response = $this->visit('/apps')
             ->see('Apps');
    }

    /**
     * Test to see if home page is returned
     *
     * @return void
     */
    public function testNews()
    {
        $this->visit('/news')
             ->see('News');
    }

        /**
     * Test to see if home page is returned
     *
     * @return void
     */
    public function testContact()
    {
        $this->visit('/contact')
             ->see('Contact');
    }

}
