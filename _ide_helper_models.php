<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Chat
 *
 * @property int $id
 * @property int $friend_id
 * @property int $sender_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Friend $friend
 * @property-read \App\Models\User $sender
 * @method static \Database\Factories\ChatFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Query\Builder|Chat onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereFriendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Chat withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Chat withoutTrashed()
 */
	class Chat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Friend
 *
 * @property int $id
 * @property int $parent_id
 * @property int $user_id
 * @property bool $accepted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $parent
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Friend accepted($value = true)
 * @method static \Database\Factories\FriendFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend query()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereUserId($value)
 */
	class Friend extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $gender
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $picture_url
 * @property mixed $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Friend[] $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Friend[] $requests
 * @property-read int|null $requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePictureUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

