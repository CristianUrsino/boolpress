@extends('layouts.app')
@section('content')
    <section class="container">
       <h1>{{$post->title}}</h1>
       <div>{{$post->body}}</div>
       
       <div style="width: 200px"><img src="{{asset('storage/'.$post->image)}}" alt=""></div>
    </section>
@endsection