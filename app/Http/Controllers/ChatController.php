<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;

class ChatController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Chat::class, 'chat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        $data = $request->validated();

        $data['sender_id'] = $request->user()->id;

        return Chat::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        $chat->load('friend.parent', 'friend.user');

        return $chat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->noContent();
    }
}
