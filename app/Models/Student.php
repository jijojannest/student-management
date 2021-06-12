<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'staff_id',
        'gender'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'staff_id');
    }
    public function marks(){
        return $this->hasMany(Mark::class);
    }

}
