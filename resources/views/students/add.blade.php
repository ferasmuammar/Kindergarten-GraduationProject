@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('Student.store') }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">المعلومات الشخصية</h6><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم الطالب كاملا : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الايميل : </label>
                                    <input type="email"  name="email" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>كلمه المرور :</label>
                                    <input  type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">الجنس : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>احتر من القائمه...</option>
                                        @foreach($Genders as $Gender)
                                            <option  value="{{ $Gender->id }}">{{ $Gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nal_id">الجنسية : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option selected disabled>اختر من القائمه...</option>
                                        @foreach($nationals as $nal)
                                            <option  value="{{ $nal->id }}">{{ $nal->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تاريخ الميلاد  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">رقم الجوال</label>
                                <input type="text" name="Mobile" class="form-control">
                                @error('Mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">العمر</label>
                                <input type="text" name="Age" class="form-control">
                                @error('Age')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">العنوان</label>
                            <textarea class="form-control" name="Address"
                                      id="exampleFormControlTextarea1" rows="4"></textarea>
                            @error('Address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">معلومات الطالب</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">اسم المرحله : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>اختر من القائمه...</option>
                                        @foreach($my_classes as $c)
                                            <option  value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id">

                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">القسم: </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <option selected disabled>اختر من القائمه...</option>
                                        @foreach($section as $c)
                                            <option  value="{{ $c->id }}">{{ $c->Name_Section }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">السنه الدراسية : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>اختر من القائمه...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
