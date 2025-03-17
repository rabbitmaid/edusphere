<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
        'name',
        'value'
    ];

    public static function registrationFee()
    {
       $fee = self::where(['name' => 'registration_fee'])->first()->value;
       return $fee;
    }

    public static function currency()
    {
        return self::where(['name' => 'currency'])->first()->value;
    }
}
