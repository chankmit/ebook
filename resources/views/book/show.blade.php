@extends('layouts.app')
@section('content') 
    <div class="container">   
    <h2>หนังสืออิเล็กทรอนิกส์ "{{$book->name}}"</h2>
    <div>
        <strong>{{$book->writer}}</strong>
        <div>Category : {{$book->category_id}}</div>
        <div>Updated : {{$book->created_at}}</div>
    </div>
    <br>
    <h3>รายละเอียด</h3>
    <p>{{$book->detail}}</p>
      <div class="_df_book" height="550" webgl="true" backgroundcolor="teal"
              source="{{asset('uploads/books/'.$book->file)}}"
              id="df_manual_book">
      </div> 
    </div>   
@endsection