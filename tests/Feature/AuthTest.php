<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Tests\Authenticatable;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use Authenticatable, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function it_logs_a_user_in()
    {
        $password = $this->faker->password;

        $user = $this->createUser(['password' => $password]);

        $data = [
            'username' => $user->username,
            'password' => $password,
        ];

        $this->postJson(route('auth.login'), $data)
            ->assertOk();
    }

    /**
     * @test
     */
    public function it_registers_a_user()
    {
        $data = User::factory()->data();

        $data['password'] = $this->faker->password;

        $this->postJson(route('auth.register'), $data)
            ->assertCreated();
    }

    /**
     * @test
     */
    public function it_returns_a_user()
    {
        $user = $this->actAs();

        $response = $this->getJson(route('auth.check'))
            ->assertOk();

        $this->assertTrue($user->id === $response->json('id'));
    }


    /**
     * @test
     */
    public function it_verifies_a_user_email()
    {
        $user = $this->createUser();

        $route = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
                'token' => $user->createToken(Str::random(10))->plainTextToken,
            ]
        );

        $this->getJson($route)
            ->assertRedirect(url('/login/verified'));
    }

    /**
     * @test
     */
    public function it_updates_self()
    {
        $this->actAs();

        $this->putJson(route('auth.update'), User::factory()->data())
            ->assertOk();
    }
}
