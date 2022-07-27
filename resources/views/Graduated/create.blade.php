@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   قائمه الخرجين
@stop
@endsection
@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> إضافه تخرج جديد</i></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">إضافة تخرج جديد</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
    إضافه تخرج جديد
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_Graduated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <form action="{{route('Graduated.store')}}" method="post">
                        @csrf
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">المرحله الدراسيه</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>اختار من القائمه...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">القسم : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>
                                    <option selected disabled>اختار من القائمه...</option>
                                    @foreach($Section as $ss)
                                        <option value="{{$ss->id}}">{{$ss->Name_Section}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">تاكيد</button>
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


@endsection
