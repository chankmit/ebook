@extends('layouts.app')

@section('content')
<div class="container">

{!! Form::open(['method'=>'POST', 'action'=>'BookController@store', 'files'=>true]) !!}
    <div class="card">
        <div class="card-header">เพิ่มหนังสือใหม่</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('name', 'ชื่อหนังสือ') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div> 
                <div class="col-md-6">
                    {!! Form::label('writer', 'ผู้เขียน') !!}
                    {!! Form::text('writer', null, ['class'=>'form-control']) !!}
                </div> 
            </div>
            <div class="row"> 
                <div class="col-md-6">
                    {!! Form::label('keyword', 'คำค้น') !!}
                    {!! Form::text('keyword', null, ['class'=>'form-control']) !!}
                </div> 
                <div class="col-md-6"> 
                    {!! Form::label('category_id', 'หมวดหมู่') !!}
                    {!! Form::select('category_id',$categories, null, ['class'=>'form-control', 'placeholder' => 'Please Select'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('image', 'ภาพหนังสือ') !!}
                    {!! Form::file('image', ['class'=>'form-control']) !!}
                </div>            
                <div class="col-md-6">
                    {!! Form::label('file', 'ไฟล์หนังสือ') !!}
                    {!! Form::file('file', ['class'=>'form-control']) !!}
                </div> 
            </div>  
            <div class="form-group">
                {!! Form::label('detail', 'รายละเอียด') !!}
                {!! Form::textarea('detail',null,['class'=>'form-control', 'rows' => 5]) !!}
            </div>  
            <div class="card-footer">
                {!! Form::submit('บันทึกข้อมูล', ['class'=>'btn btn-success']) !!}
                {!! link_to('admin/book', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);!!}
            </div>
    </div>
    {!! Form::close() !!} 
</div>
@endsection