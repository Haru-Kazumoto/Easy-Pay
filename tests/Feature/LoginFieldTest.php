<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Tests\TestCase;

class LoginFieldTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_with_emp_uid_field() 
    {
        $user = User::factory()->create([
            'name' => 'User Test',
            'email' => 'user_test@gmail.com',
            'password' => Hash::make("user_test_123"),
            'emp_id' => '#289374',
            'role_level' => 2
        ]);

        $response = $this->post('/admin/login', [
            'emp_id' => '#289374',
            'password' => 'user_test_123'
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);
    }
}
