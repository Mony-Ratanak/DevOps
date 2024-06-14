<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        // Step1. Navigate to the registration page
        $response = $this->get('/register');
        $response->assertStatus(200);

        // Step2. Fill in registration form and submit
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Step3. Click "Register" button is simulated by the post request above

        // Step4. Make an assertion that you can see the message "You are logged in!"
        $response->assertRedirect('/');
        $this->assertAuthenticated();
        $response = $this->get('/');
        $response->assertSee('You are logged in!');
    }
}
