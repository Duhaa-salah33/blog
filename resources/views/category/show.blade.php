@extends('main')

@section('title','|View Category')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>{{ $category->name }}</h1>
    </div>
            <hr>

            <div class="row">

                <div class="col-sm-6">
                    <a href="{{route('category.edit' , $category->id)}}" class="btn btn-primary btn-block">Edit</a>
                </div>

                <div class="row">
                        <div class="col-ms-6">
                            <form action="/category/{{ $category->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="col-md-12">
                                <button class="form-control btn-danger btn-block" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr> 

        
</div>
@endsection

