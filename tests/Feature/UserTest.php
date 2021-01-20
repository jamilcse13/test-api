<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserData()
    {
        $this->withoutExceptionHandling();  // by using this method, we can find out the error part more specifially.

        /**
         * @test
         * 
         * @return Pass if our testing condition is right otherwise it returns failed
         * we can use withoutExceptionHandling() to check our expected error
         */
        $this->assertDatabaseHas('users', [
            'name' => 'jamil',
            'email' => 'demo@laravel.com'
        ]);
    }
}
