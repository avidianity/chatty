<?php

namespace App\Providers;

use App\Models\Chat;
use App\Models\Friend;
use App\Policies\ChatPolicy;
use App\Policies\FriendPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Chat::class => ChatPolicy::class,
        Friend::class => FriendPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
