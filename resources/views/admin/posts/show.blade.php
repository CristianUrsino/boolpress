@extends('layouts.app')
@section('content')
    <section class="container">
       <h1>{{$post->title}}</h1>
       <div>{{$post->body}}</div>
       {{-- PER INSERIRE IMG --}}
       <div style="width: 200px"><img src="{{asset('storage/'.$post->image)}}" alt=""></div>
    </section>
@endsection