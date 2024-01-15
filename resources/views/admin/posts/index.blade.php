@extends('layouts.app')
@section('content')
    <section class="container">
       <h1>post index</h1>
       @foreach ($posts as $post)
            <p><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></p>
       @endforeach
    </section>
@endsection