<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'admin_id',
        'student_id',
        'subject_id',
        'sequence_id',
        'score'
    ];


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function sequence()
    {
        return $this->belongsTo(Sequence::class);
    }

    public static function storeMark($scores, $sequenceId, $subjectId, $adminId)
    {
        foreach($scores as $studentId => $score) {

            $student = Student::findOrFail($studentId);

            if($student->markExists($sequenceId, $subjectId)) {

                Mark::where(['student_id' => $studentId, 'sequence_id' => $sequenceId, 'subject_id' => $subjectId])->update([
                    'admin_id' => $adminId,
                    'student_id' => $studentId,
                    'sequence_id' => $sequenceId,
                    'subject_id' => $subjectId,
                    'score' => $score
               ]);

            }
            else { 
                $storeMark = Mark::create([
                    'admin_id' => $adminId,
                    'student_id' => $studentId,
                    'sequence_id' => $sequenceId,
                    'subject_id' => $subjectId,
                    'score' => $score
               ]);
            }

        
        }
    }

}
