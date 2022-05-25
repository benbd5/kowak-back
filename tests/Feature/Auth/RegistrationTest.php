<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    public function test_users_can_register()
    {
        $response = $this->post('/register', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@doe.com',
            'password' => 'Pâssword.1',
            'password_confirmation' => 'Pâssword.1',
        ]);

        $response->assertStatus(204);
    }

    public function test_new_users_can_not_register()
    {
        $this->post('/register', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
    }
}
