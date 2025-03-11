<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'matricule',
        'class_id',
        'address',
        'date_of_birth',
        'place_of_birth',
        'phone'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function class() {
        return $this->belongsTo(SchoolClass::class);
    }
}
