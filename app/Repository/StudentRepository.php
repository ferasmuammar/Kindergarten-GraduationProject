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
    public function Get_Student()
    {
        $students = Student::all();
        return view('students.index',compact('students'));
    }

    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        //$data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['section']=Section::all();
        $data['nationals'] = Nationality::all();
        $Students =  Student::findOrFail($id);
        return view('students.edit',$data,compact('Students'));
    }

    public function Update_Student($request)
    {
        try {
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->name = $request->name;
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;

            $Edit_Students->Mobile=$request->Mobile;
            $Edit_Students->Age=$request->Age;
            $Edit_Students->Address=$request->Address;

            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success('تم تعديل البيانات بنجاح');
            return redirect()->route('Student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

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
            return redirect()->route('Student.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    public function Delete_Student($request)
    {

        Student::destroy($request->id);
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('Student.index');
    }
}
