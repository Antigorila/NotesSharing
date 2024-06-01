<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FriendRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'from_user_id'];

    public function to_user():BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function from_user():BelongsTo 
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
