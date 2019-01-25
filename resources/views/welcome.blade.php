@extends('layouts.app')

@section('content')
<div class="container">
    <h3>รายการหนังสืออิเล็กทรอนิกส์</h3>
    <p>รายการหนังสืออิเล็กทรอนิกส์ทั้งหมด</p>
    @if(count($books)>0)
    <div class="card-columns">   
        @foreach($books as $book)
        <div class="card"> 
            <a href="{{url('/show/'.$book->id)}}"><img class="card-img-top" src="{{asset('uploads/images/'.$book->image)}}" alt="Card image cap"></a>
            <div class="card-body">
            <h5 class="card-title">{{$book->name}}</h5>
            <!--<p class="card-text">{{$book->detail}}</p>-->
            <p class="card-text"><small class="text-muted">By : {{$book->writer}} , Updated : {{$book->updated_at}}</small></p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">ขออภัย</h4>
        <p>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</p>
        <hr>
        <p class="mb-0">
            <a href="{{url('/')}}">ดูข้อมูลหนังสือทั้งหมด</a>
        </p>
    </div>
    @endif
</div>
@endsection