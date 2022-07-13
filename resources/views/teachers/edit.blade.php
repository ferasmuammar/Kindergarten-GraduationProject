@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   تعديل بيانات المعلم
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('Teachers.update','test') }}" method="post">
                            {{method_field('patch')}}
                             @csrf
                             <div class="form-row">
                                <div class="col">
                                    <label for="title">الايميل</label>
                                    <input type="hidden" value="{{$Teachers->id}}" name="id">
                                    <input type="email" name="Email" value="{{$Teachers->Email}}" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">كلمة المرور</label>
                                    <input type="password" name="Password" value="{{$Teachers->Password}}" class="form-control">
                                    @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الإسم الأول</label>
                                    <input type="text" name="First_name" value="{{$Teachers->First_name}}" class="form-control">
                                    @error('First_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">الإسم الثاني</label>
                                    <input type="text" name="Second_name" value="{{$Teachers->Second_name}}" class="form-control">
                                    @error('Second_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">العائلة</label>
                                    <input type="text" name="Last_name" value="{{$Teachers->Last_name}}" class="form-control">
                                    @error('Last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">التخصص</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option value="{{$Teachers->Specialization_id}}">{{$Teachers->specializations->name}}</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">الجنس</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option value="{{$Teachers->Gender_id}}">{{$Teachers->genders->name}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach


                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">الجنسية</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Nationalitie_id">
                                        <option value="{{$Teachers->Nationalitie_id}}">{{$Teachers->nationalitys->name}}</option>
                                        @foreach($nationalitys as $nationality)
                                            <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                        @endforeach


                                    </select>
                                    @error('Nationalitie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">رقم الجوال</label>
                                    <input type="text" name="Mobile"  value="{{$Teachers->Mobile}}" class="form-control">
                                    @error('Mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">العمر</label>
                                    <input type="text" name="Age"  value="{{$Teachers->Age}}" class="form-control">
                                    @error('Age')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group col">
                                    <label for="inputState">الحالة</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender">
                                        <option selected disabled>اختر من القائمة...</option>
                                        <option value="Active">نشط</option>
                                        <option value="unActive">غير نشط</option>

                                    </select>
                                    @error('Gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}


                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">تاريخ الميلاد</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action" value="{{$Teachers->DateOfBirth}}"   name="DateOfBirth" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('DateOfBirth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">العنوان</label>
                                <textarea class="form-control" name="Address"
                                          id="exampleFormControlTextarea1" rows="4">{{$Teachers->Address}}</textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تعديل البايانات</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
