<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'type',
        'amount',
        'currency',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
