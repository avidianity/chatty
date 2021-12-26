<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Authenticatable;
use Tests\TestCase;

class FriendTest extends TestCase
{
    use RefreshDatabase, WithFaker, Authenticatable;

    /**
     * @test
     */
    public function it_can_list_friends()
    {
        $user = $this->actAs();

        $friend = User::factory()->create();

        $user->friends()->create(['user_id' => $friend->id, 'accepted' => true]);

        $response = $this->getJson(route('friends.index'))
            ->assertOk();

        $this->assertTrue(collect($response->json())->count() === $user->friends()->count());
    }

    /**
     * @test
     */
    public function it_cannot_show_non_friend()
    {
        $me = $this->actAs();

        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $friend = $userOne->friends()->create(['user_id' => $userTwo->id, 'accepted' => true]);

        $this->getJson(route('friends.show', ['friend' => $friend->id]))
            ->assertForbidden();
    }

    /**
     * @test
     */
    public function it_can_show_friend()
    {
        $me = $this->actAs();

        $user = User::factory()->create();

        $friend = $me->friends()->create(['user_id' => $user->id, 'accepted' => true]);

        $this->getJson(route('friends.show', ['friend' => $friend->id]))
            ->assertOk();
    }

    /**
     * @test
     */
    public function it_can_add_friend()
    {
        $this->actAs();

        $userToBeAdded = User::factory()->create();

        $this->postJson(route('friends.store'), ['user_id' => $userToBeAdded->id])
            ->assertCreated();
    }

    /**
     * @test
     */
    public function it_cannot_accept_friend_requests()
    {
        $this->actAs();

        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $friend = $userOne->friends()->create(['user_id' => $userTwo->id]);

        $this->putJson(route('friends.update', ['friend' => $friend->id]))
            ->assertForbidden();
    }

    /**
     * @test
     */
    public function it_can_accept_friend_requests()
    {
        $me = $this->actAs();

        $user = User::factory()->create();

        $friend = $user->friends()->create(['user_id' => $me->id]);

        $this->putJson(route('friends.update', ['friend' => $friend->id]))
            ->assertOk();
    }

    /**
     * @test
     */
    public function it_cannot_accept_own_friend_requests()
    {
        $me = $this->actAs();

        $user = User::factory()->create();

        $friend = $me->friends()->create(['user_id' => $user->id]);

        $this->putJson(route('friends.update', ['friend' => $friend->id]))
            ->assertForbidden();
    }

    /**
     * @test
     */
    public function it_cannot_delete_friend()
    {
        $this->actAs();

        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $friend = $userOne->friends()->create(['user_id' => $userTwo->id]);

        $this->deleteJson(route('friends.destroy', ['friend' => $friend->id]))
            ->assertForbidden();
    }

    /**
     * @test
     */
    public function it_can_delete_friend()
    {
        $me = $this->actAs();

        $user = User::factory()->create();

        $friend = $user->friends()->create(['user_id' => $me->id]);

        $this->deleteJson(route('friends.destroy', ['friend' => $friend->id]))
            ->assertNoContent();
    }
}
