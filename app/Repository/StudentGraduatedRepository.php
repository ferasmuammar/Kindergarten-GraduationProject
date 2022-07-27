<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('Graduated.index',compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        $Section=Section::all();
        return view('Graduated.create',compact('Grades','Section'));
    }

    public function SoftDelete($request)
    {
        $students = student::where('Grade_id',$request->Grade_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)->Delete();
        }

        toastr()->success('تمت العمليه بنجاح');
        return redirect()->route('Graduated.index');
    }

    public function ReturnData($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success('تمت العلميه بنجاح');
        return redirect()->back();
    }

    public function destroy($request)
    {
        student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->back();
    }


}
