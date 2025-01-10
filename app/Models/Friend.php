<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friend extends Model
{

    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];
    protected $table = "friend";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    
    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'friend_id');
    }
}
