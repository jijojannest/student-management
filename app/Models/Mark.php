<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'student_id',
        'term',
        'marks'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
