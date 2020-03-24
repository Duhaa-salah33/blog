@extends('main')

@section('title','|View Tag')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>{{ $tag->name }}</h1>
    </div>
            <hr>

            <div class="row">

                <div class="col-sm-6">
                    <a href="{{route('tags.edit' , $tag->id)}}" class="btn btn-primary btn-block">Edit</a>
                </div>
               
            <div class="row">
                <div class="col-ms-6">
                    <form action="/tags/{{ $tag->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="col-md-12">
                        <button class="form-control btn-danger btn-block" type="submit">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
</div>
@endsection



