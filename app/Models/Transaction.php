<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
        'user_id',
        'avatar_id',
        'created_at',
        'updated_at',
        // Tambahkan kolom lain yang ingin diisi secara massal
    ];

    public function avatar(): BelongsTo
    {
        return $this->belongsTo(Avatar::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
