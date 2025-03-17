<?php

namespace App\Models;

use Illuminate\Support\Carbon;
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

    public static function dailyTransactions()
    {
        $date = Carbon::today();

        $transactions = self::whereDate('created_at', $date)
            ->selectRaw('TIME(created_at) as time, amount')
            ->orderBy('created_at', 'asc')
            ->get();

        return json_encode($transactions);
    }
}
