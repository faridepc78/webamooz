<?php

namespace Faridepc78\User\Tests\Feature;

use Faridepc78\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    
    public function test_user_can_login_by_email()
    {
        $user = User::create(
            [
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'password' => bcrypt('A!123a'),
            ]
        );

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'A!123a'
        ]);

        $this->assertAuthenticated();
    }

    public function test_user_can_login_by_mobile()
    {
        $user = User::create(
            [
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'mobile' => '9391238965',
                'password' => bcrypt('A!123a'),
            ]
        );

        $this->post(route('login'), [
            'email' => $user->mobile,
            'password' => 'A!123a'
        ]);

        $this->assertAuthenticated();
    }
}