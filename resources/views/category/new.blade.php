@extends('layouts.app')

@section('content')
<div class="container">

{!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store', 'files'=>true]) !!}
    <div class="card">
        <div class="card-header">เพิ่มหมวดหมู่ใหม่</div>
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'ชื่อหมวดหมู่') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('detail', 'รายละเอียดหมวดหมู่') !!}
                {!! Form::textarea('detail',null,['class'=>'form-control', 'rows' => 5]) !!}
            </div> 
        <div class="card-footer">
            {!! Form::submit('บันทึกข้อมูล', ['class'=>'btn btn-success']) !!}
            {!! link_to('admin/category', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);!!}
        </div>
    </div>
    {!! Form::close() !!} 
</div>
@endsection