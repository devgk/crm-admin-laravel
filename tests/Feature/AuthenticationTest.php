<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        /** 
         * Guest authentication
         * Guest user should not be able to access dashboard */
        $response = $this->get('/');
        $response->assertRedirect(uri: 'login');

        // Create Test User
        $user = User::factory()->create();

        // Try to access dashboard
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);

        // Try to access manage product page
        $response = $this->actingAs($user)->get('/product');
        $response->assertRedirect(uri: 'access-denied');

        // Try to access manage product page
        $response = $this->actingAs($user)->get('/category');
        $response->assertRedirect(uri: 'access-denied');
    }
}
