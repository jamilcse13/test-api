<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

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
            'name' => 'John Doe',
            'email' => 'john@laravel.com'
        ]);
    }

    function testUserRouteConnection()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/users');

        $response->assertStatus(200);
    }
    
    public function testUserCreate()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('post', '/users', [
            'name' => 'John Doe',
            'email' => 'john@laravel.com',
            'password' => '123456'
        ]);

        $response->assertOk();
    }

    public function testValidatedata()
    {
        $validationResponse = $this->json('post', '/users', [
            'name' => 'John Doe',
            'email' => 'john@laravel.com',
            'password' => ''
        ]);

        $validationResponse->assertStatus(422);
    }
}
