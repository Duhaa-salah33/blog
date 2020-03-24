@extends('main')

@section('title','|Edit Post')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
                <form action="/posts/{{$post->id}}" method="POST">
                    @method('PATCH')
                    @csrf
    
            <div class="form-group m-2">
                 <label for="titlelabel">Title :</label>
                 <input type="text" name="title" class="form-control" id="titlelabel" value="{{ $post->title }}" >

                 <label for="url">URL :</label>
                 <input type="text" name="slug" class="form-control" id="url" value="{{ $post->slug }}" >

                 <label for="category_id">Category :</label>
                <select name="category_id" class="form-control">
                        

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                 <label for="bodylabel">Post :</label>
                    <textarea name="body"  class="form-control" id="bodylabel" rowa="10"> {{ $post->body  }} </textarea>
             </div>

             

                <div class="col-md-4">
                        <div class="well">
                            <dl class="dl-horizontal">
                                <dt>Created At:</dt>
                                <dd>{{ date( 'M j, Y h:ia' , strtotime($post->created_at)) }}</dd>
                            </dl>
                            
                            <dl class="dl-horizontal">
                                <dt>Last Update:</dt>
                                <dd>{{ date( 'M j, Y h:ia' , strtotime($post->updated_at)) }}</dd>
                            </dl>
                
                            <hr>
                            <div class="row">

                                    <div class="col-sm-6">
                                    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-danger btn-block">Cancel</a>
                                    </div>
                    
                                    <div class="col-sm-6">
                                       <button class="btn btn-success btn-block" type="submit">Update</button>
                                    </div> 
      
                    
                             </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
