<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSections;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Grades = Grade::with(['Sections'])->get();
         $list_Grades = Grade::all();
         $teachers=Teacher::all();
         return view('sections.Sections',compact('Grades','list_Grades','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSections $request)
    {
        try {

            $validated = $request->validated();
            $Sections = new Section();

            $Sections->Name_Section = $request->Name_Section;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success('تمت الاضافة بنجاح');
            return redirect()->route('section.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(StoreSections $request)
    // {
    //     try {
    //         $validated = $request->validated();
    //         $Sections = Section::findOrFail($request->id);

    //         $Sections->Name_Section = $request->Name_Section;
    //         $Sections->Grade_id = $request->Grade_id;
    //         if(isset($request->Status)) {
    //           $Sections->Status = 1;
    //         } else {
    //           $Sections->Status = 2;
    //         }

    //         $Sections->save();
    //         toastr()->success('تم تحديث البيانات بنجاح');

    //         return redirect()->route('section.index');
    //     }
    //     catch
    //     (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }

    public function update(StoreSections $request)
    {

      try {
      //  $validated = $request->validated();
        $Sections = Section::findOrFail($request->id);

        $Sections->update([
            $Sections->Name_Section = $request->Name_Section,
              $Sections->Grade_id = $request->Grade_id,

        ]);

        if(isset($request->Status)) {
          $Sections->Status = 1;
        } else {
          $Sections->Status = 2;
        }

        toastr()->success('تم تحديث البيانات بنجاح');
        return redirect()->route('section.index');
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {

      Section::findOrFail($request->id)->delete();
      toastr()->error('تم حذف البيانات بنجاح ');
      return redirect()->route('section.index');

    }
}
