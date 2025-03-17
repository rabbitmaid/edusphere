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
            ->whereStatus('success')
            ->orderBy('created_at', 'asc')
            ->get();

        return json_encode($transactions);
    }

    public static function totalTransactions()
    {
        return self::whereStatus('success')
                    ->selectRaw('SUM(amount) as total')
                    ->first();
    }

    public static function totalTransaction(int $userId)
    {
        return self::whereStatus('success')
                    ->whereUserId($userId)
                    ->selectRaw('SUM(amount) as total')
                    ->first();
    }
}
