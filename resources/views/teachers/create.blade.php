@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    إضافة معلم
@stop
@endsection
@section('page-header')
   <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> إضافه معلم</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الصفحه الرئيسية</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
    إضافة معلم
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
                            <form action="{{ route('Teachers.store') }}" method="post">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الايميل</label>
                                    <input type="email" name="Email" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">كلمة المرور</label>
                                    <input type="password" name="Password" class="form-control">
                                    @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الإسم الأول</label>
                                    <input type="text" name="First_name" class="form-control">
                                    @error('First_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">الإسم الثاني</label>
                                    <input type="text" name="Second_name" class="form-control">
                                    @error('Second_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">العائلة</label>
                                    <input type="text" name="Last_name" class="form-control">
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
                                        <option selected disabled>اختر التخصص...</option>
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
                                        <option selected disabled>اختر من القائمة...</option>
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
                                        <option selected disabled>اختر من القائمة...</option>
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
                                        <input class="form-control" type="text"  id="datepicker-action" name="DateOfBirth" data-date-format="yyyy-mm-dd"  required>
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
                                          id="exampleFormControlTextarea1" rows="4"></textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البايانات</button>
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
