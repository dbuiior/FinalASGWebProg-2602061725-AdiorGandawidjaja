<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Avatar extends Model
{
    protected $table = 'avatar';

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

}
