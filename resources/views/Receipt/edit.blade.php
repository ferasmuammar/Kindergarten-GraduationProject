@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
  تعديل سند قبض
@stop
@endsection
@section('page-header')

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">تعديل سند قبض : <label style="color: red">{{$receipt_student->student->name}}</label></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الصفحه الرئيسية</a></li>
                <li class="breadcrumb-item active">تعديل سند قبض : <label style="color: red">{{$receipt_student->student->name}}</li>
            </ol>
        </div>
    </div>
</div>
@section('PageTitle')
تعديل سند قبض : <label style="color: red">{{$receipt_student->student->name}}</label>
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

                            <form action="{{route('receipt_students.update','test')}}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>المبلغ : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="Debit" value="{{$receipt_student->Debit}}" type="number" >
                                        <input  type="hidden" name="student_id" value="{{$receipt_student->student->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$receipt_student->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>البيان : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$receipt_student->description}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تأكيد</button>
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
