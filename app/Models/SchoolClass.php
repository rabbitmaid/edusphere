<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name',
        'cycle_id'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
