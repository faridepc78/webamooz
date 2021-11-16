<?php

namespace Faridepc78\User\Tests\Feature;

use Faridepc78\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_register_from()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->registerNewUser();

        $response->assertRedirect(route('home'));

        $this->assertCount(1, User::all());
    }

    public function test_use_have_to_verify_account()
    {
        $this->registerNewUser();

        $response = $this->get(route('home'));

        $response->assertRedirect(route('verification.notice'));
    }

    public function test_verified_user_can_see_home_page()
    {
        $this->registerNewUser();

        $this->assertAuthenticated();

        auth()->user()->markEmailAsVerified();

        $response = $this->get(route('home'));

        $response->assertOk();
    }

    public function registerNewUser()
    {
        return $this->post(route('register'), [
            'name' => 'HMN',
            'email' => 'hemn791@gmail.com',
            'mobile' => '9367853698',
            'password' => 'As25@#',
            'password_confirmation' => 'As25@#'
        ]);
    }
}
