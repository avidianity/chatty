<?php

namespace Tests;

use App\Models\User;
use Laravel\Sanctum\Sanctum;

trait Authenticatable
{
    /**
     * Create a user
     *
     * @param array $attributes
     * @return \App\Models\User
     */
    public function createUser($attributes = [])
    {
        return User::factory()->create($attributes);
    }

    /**
     * Create and authenticate a user
     *
     * @return \App\Models\User
     */
    public function actAs()
    {
        return Sanctum::actingAs($this->createUser());
    }
}
