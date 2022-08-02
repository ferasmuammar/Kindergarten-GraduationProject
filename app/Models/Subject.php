<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name','grade_id','teacher_id'];


    // جلب اسم المراحل الدراسية

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    // جلب اسم المعلم
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
}
