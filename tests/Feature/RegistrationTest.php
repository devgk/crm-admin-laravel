<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
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
        $response = $this->get('/register');
        $response->assertStatus(200);

        // Fill registration form
        $response = $this->followingRedirects()->post('/register', [
            'name' => 'Ajay Kumar',
            'email' => 'ajay@gmail.com',
            'password' => 'abc1234',
            'password_confirmation' => 'abc1234'
        ]);

        $response->assertStatus(200);
    }
}
