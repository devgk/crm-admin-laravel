<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        /** Guest can access registration form */
        $response = $this->get('/login');
        $response->assertStatus(200);

        // Create Ajay User
        $user = User::make([
            'name' => 'Ajay Agarwal',
            'email' => 'ajay@gmail.com',
            'password' => 'abc1234'
        ]);

        // Login Ajay User
        $response = $this->followingRedirects()->post('/login', [
            'email' => 'ajay@gmail.com',
            'password' => 'abc1234',
        ]);

        $response->assertStatus(200);
    }
}
