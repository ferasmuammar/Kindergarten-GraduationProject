<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\promotion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::all();
        $Section=Section::all();
        return view('promotion.index',compact('Grades','Section'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $students = student::where('Grade_id',$request->Grade_id)->where('section_id',$request->section_id)->get();

            if($students->count() < 1){
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }

            // update in table student
            foreach ($students as $student){

                $ids = explode(',',$student->id);
                student::whereIn('id', $ids)
                    ->update([
                        'Grade_id'=>$request->Grade_id_new,
                        'section_id'=>$request->section_id_new,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_grade'=>$request->Grade_id,
                    'from_section'=>$request->section_id,
                    'to_grade'=>$request->Grade_id_new,
                    'to_section'=>$request->section_id_new,
                ]);

            }
            DB::commit();
            toastr()->success('تمت الترقيه بنجاح');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
}
