<?php

namespace Tests\Feature\Auth;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_users_can_authenticate_using_sanctum()
    {
        $this->actingAs(Users::factory()->create());
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = Users::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
