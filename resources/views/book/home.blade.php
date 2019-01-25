@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url('/admin/book/create')}}" class="btn btn-success float-right">สร้างรายการหนังสือใหม่</a>
    <h3>รายการหนังสืออิเล็กทรอนิกส์</h3>
    <p>รายการหนังสืออิเล็กทรอนิกส์ทั้งหมดในระบบ</p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th width="150">Image</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td><a href="{{url('/show/'.$book->id)}}"><img src="{{asset('uploads/images/'.$book->image)}}" width="150" alt=""></a></td>
                <td>
                    <strong>{{$book->name}}</strong>
                    <div>Writer : {{$book->writer}}</div>
                    <div>Category : {{$book->category_id}}</div>
                    <div>Keyword : {{$book->keyword}}</div>
                    <div>Updated : {{$book->updated_at}}</div>
                </td>
                <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['BookController@destroy', $book->id]]) !!}
                <a href="{{ url('/admin/book/'.$book->id.'/edit') }}" class="btn btn-success">แก้ไข</a>
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!} 
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection