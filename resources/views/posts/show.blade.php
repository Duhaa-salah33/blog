@extends('main')

@section('title','|View Post')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>

        <p class="lead">{{ $post->body }} </p>
    </div>
    <div class="col-md-4">
        <div class="well">

            <dl class="dl-horizontal">
                        <label>URL :</label>
                <a href="{{ route('blog.single' , $post->slug) }}">{{ url($post->slug) }} </a>
            </dl>

            <dl class="dl-horizontal">
                    <label>Category: </label>
                    <p>{{$post->category->name}}</p>
                </dl>

            <dl class="dl-horizontal">
                <label>Created At:</label>
                <p>{{ date( 'M j, Y h:ia' , strtotime($post->created_at)) }}</p>
            </dl>
            
            <dl class="dl-horizontal">
                    <label>Updated At:</label>
                <p>{{ date( 'M j, Y h:ia' , strtotime($post->updated_at)) }}</p>
            </dl>

            <hr>

            <div class="row">

                <div class="col-sm-4">
                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-block">Edit</a>
                </div>
                        <div class="col-ms-8">
                            
                            <form action="/posts/{{ $post->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="col-md-12">
                                <button class="form-control btn-danger btn-block" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                <div class="col-ms-6">
                    <a href="{{ route('posts.index') }}" class="btn btn-block btn-primary"> << See All Posts </a>
                </div>
            </div>
                    
                 </div>
            </div>
</div>
@endsection
