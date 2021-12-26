<?php

namespace App\Rules;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class IsRelatedToFriend implements Rule
{
    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Create a new rule instance.
     *
     * @param \App\Models\User
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $friend = Friend::findOrFail($value);

        return $this->user->isRelatedToFriend($friend);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Friend cannot be found.';
    }
}
