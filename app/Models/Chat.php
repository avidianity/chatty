<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Chat extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    protected $fillable = [
        'friend_id',
        'sender_id',
        'message',
    ];

    protected $casts = [
        'friend_id' => 'integer',
        'sender_id' => 'integer',
    ];

    public function friend()
    {
        return $this->belongsTo(Friend::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
