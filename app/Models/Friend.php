<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'accepted',
    ];

    protected $casts = [
        'accepted' => 'boolean',
        'parent_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * Scope a query to only include either accepted or non-accepted friends.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  bool $value
     * @return void
     */
    public function scopeAccepted($query, $value = true)
    {
        return $query->where('accepted', $value);
    }

    public function accept()
    {
        return $this->update(['accepted' => true]);
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
