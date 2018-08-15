<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserListingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertDirectoryExists('./app/Http/Controllers');

        //test to see if controller exists
        $this->assertFileExists('./app/Http/Controllers/UserListing.php');
        
        //test to see if model exists
        $this->assertFileExists('./app/Userlistings.php');

        //test to see if resource exists
        $this->assertFileExists('./app/Http/Resources/ListingsResource.php');
    }
}


