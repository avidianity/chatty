<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFriendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /**
         * @var \App\Models\User
         */
        $user = $this->user();

        return [
            'user_id' => [
                'required',
                'numeric',
                Rule::exists(User::class, 'id')
                    ->whereNot('id', $user->id)
                    ->whereNotIn('id', $user->friends->map->id)
                    ->whereNotIn('id', $user->requests->map->id),
            ],
        ];
    }
}
