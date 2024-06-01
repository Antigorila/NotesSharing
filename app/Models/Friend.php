<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Friend extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'friend_id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function friend():HasOne 
    // {
    //     return $this->hasOne(User::class, 'friend_id');
    // }

    public function friend(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

}
