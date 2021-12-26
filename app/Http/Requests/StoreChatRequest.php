<?php

namespace App\Http\Requests;

use App\Models\Friend;
use App\Rules\IsRelatedToFriend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChatRequest extends FormRequest
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
            'friend_id' => [
                'required',
                'numeric',
                Rule::exists(Friend::class, 'id'),
                new IsRelatedToFriend($user)
            ],
            'message' => ['required', 'string', 'min:1']
        ];
    }
}
