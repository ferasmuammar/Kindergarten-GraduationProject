<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Grade;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface
{
    public function Create_Student(){

        $data['my_classes'] = Grade::all();
        $data['Genders'] = Gender::all();
        $data['section']=Section::all();
        $data['nationals'] = Nationality::all();
       // $data['specialization']=Specialization::all();
        return view('students.add',$data);

     }

     public function Store_Student($request){

        try {
            $students = new Student();
            $students->name = $request->name;
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;

            $students->Date_Birth = $request->Date_Birth;

            $students->Mobile=$request->Mobile;
            $students->Age=$request->Age;
            $students->Address=$request->Address;
            
            $students->Grade_id = $request->Grade_id;
            $students->section_id = $request->section_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success('تمت الاصافه بنجاح');
            return redirect()->route('Student.create');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
