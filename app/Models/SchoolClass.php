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

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function totalStudents()
    {
        return Student::where('class_id', $this->id)->get()->count();
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
