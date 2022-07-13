<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{

    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function Getspecialization()
    {
        return Specialization::all();
    }
    public function GetNationality()
    {
        return Nationality::all();
    }

    public function GetGender()
    {
        return Gender::all();
    }

    public function StoreTeachers($request)
    {
        try{

            $Teachers=new Teacher();
            $Teachers->Email=$request->Email;
            $Teachers->Password= Hash::make($request->Password);
            $Teachers->First_name=$request->First_name;
            $Teachers->Second_name=$request->Second_name;
            $Teachers->Last_name=$request->Last_name;
            $Teachers->Mobile=$request->Mobile;
            $Teachers->Age=$request->Age;
            $Teachers->Specialization_id=$request->Specialization_id;
            $Teachers->Nationalitie_id=$request->Nationalitie_id;
            $Teachers->Gender_id=$request->Gender_id;
            $Teachers->DateOfBirth=$request->DateOfBirth;
            $Teachers->Address=$request->Address;
            $Teachers->save();
            toastr()->success('تمت الاضافة بنجاح');
            return redirect()->route('Teachers.create');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }
    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->First_name=$request->First_name;
            $Teachers->Second_name=$request->Second_name;
            $Teachers->Last_name=$request->Last_name;
            $Teachers->Mobile=$request->Mobile;
            $Teachers->Age=$request->Age;
            $Teachers->Specialization_id=$request->Specialization_id;
            $Teachers->Nationalitie_id=$request->Nationalitie_id;
            $Teachers->Gender_id=$request->Gender_id;
            $Teachers->DateOfBirth=$request->DateOfBirth;
            $Teachers->Address=$request->Address;
            $Teachers->save();
            toastr()->success('تم التعديل بنجاح');
            return redirect()->route('Teachers.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('Teachers.index');
    }
}
