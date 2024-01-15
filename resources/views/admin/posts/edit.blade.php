@extends('layouts.app')
@section('content')
    <section class="container">
       <h1>edit {{$post->title}}</h1>

       <form action="{{route('admin.posts.update', $post->id)}}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" required maxlength="200" minlength="3" value="{{old('title', $post->title)}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body">Title</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10"></textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image">Title</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn">Invia</button>
                <button type="reset" class="btn">Reset</button>
            </div>

        </form>  

    </section>
@endsection