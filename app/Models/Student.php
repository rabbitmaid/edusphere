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

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'datetime'
        ];
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function class() {
        return $this->belongsTo(SchoolClass::class);
    }

    public function marks() {
        return $this->hasMany(Mark::class);
    }

    public function getMark($sequenceId, $subjectId) {
        $mark = Mark::where(['student_id' => $this->id, 'sequence_id' => $sequenceId, 'subject_id' => $subjectId])->first();
        return $mark->score ?? 0;
    }

    public function markExists($sequenceId, $subjectId) {
        $mark = Mark::where(['student_id' => $this->id, 'sequence_id' => $sequenceId, 'subject_id' => $subjectId])->first();
        
        if($mark) {
            return true;
        }

        return false;
    }
}
