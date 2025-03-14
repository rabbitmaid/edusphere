<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    public function schoolClasses()
    {
        return $this->hasMany(SchoolClass::class);
    }
}
