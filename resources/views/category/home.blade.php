@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url('/admin/category/create')}}" class="btn btn-success float-right">สร้างหมวดหมู่ใหม่</a>
    <h3>รายการหมวดหมู่หนังสืออิเล็กทรอนิกส์</h3>
    <p>รายการหมวดหมู่หนังสืออิเล็กทรอนิกส์ในระบบ</p>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}} <small>{{$cat->detail}}</small></td>
                <td> 
                {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $cat->id]]) !!}
                <a href="{{ url('/admin/category/'.$cat->id.'/edit') }}" class="btn btn-success">แก้ไข</a>
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection