<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   // protected $fillable=['Email','Password','First_name','Second_name','Last_name','Mobile','DateOfBirth','Gender','Address','Age','Status','Specialization_id','Nationalitie_id'];
    protected $guarded=[];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
     public function specializations()
     {
         return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
     }

     //علاقة بين المعلمين والجنسيات لجلب جنسية المعلم

     public function nationalitys()
     {
         return $this->belongsTo('App\Models\Nationality', 'Nationalitie_id');
     }

      //علاقة بين المعلمين والجنسيات لجلب جنسية المعلم
     public function genders()
     {
         return $this->belongsTo('App\Models\Gender', 'Gender_id');
     }

     // علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }


}
