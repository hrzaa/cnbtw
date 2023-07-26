<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    // use RefreshDatabase;

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_user_can_access_login_page()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_dashboard()
    {
        $response = $this->get('/admin/');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_login_redirect_to_home_successfully()
    {
        $response = $this->post('/login', [
            'email' => 'test@gmail.com',
            'password' => '12345678'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_user_can_logout()
    {
        $user = User::first();
        $this->actingAs($user);
        $this->post('logout')->assertRedirect('/');
    }

    

}
