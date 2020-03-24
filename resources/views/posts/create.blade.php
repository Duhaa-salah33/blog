@extends('main')

@section('title','|Create New Post')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

 <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
    <hr>
 <form  action="/posts" method="POST" data-parsley-vaidate="">
    
    @csrf
    
     <div class="form-group m-2">
          <label for="titlelabel">Title :</label>
          <input type="text" name="title" class="form-control" id="titlelabel" value="{{ old('title') }}"  required>
      </div>

      <div class="form-group m-2">
          <label for="sluglabel">URL :</label>
          <input type="text" name="slug" class="form-control" id="sluglabel" value="{{ old('slug') }}"  required>
      </div>

      <div class="form-group m-2">
        <label for="category_id">Category :</label>
        <select name="category_id" class="form-control">

          @foreach ($categories as $category)
        <option value="{{$category->id}}">{{ $category->name }}</option>
          @endforeach
        
        </select>
      </div>

      <div class="form-group" data-parsley-vaidate="">    
          <label for="bodylabel">Post :</label>
          <textarea name="body"  class="form-control" value="{{ old('body') }}" rows="10" required>
          </textarea>

          <div class="btn btn-success btn-lg btn-block"  style="margin-top:20px">
          <button type="submit" class="form-control">create post</button>
          </div>
          </div>
    </form>
  
     
 
    </div>
</div> 

@endsection


@section('scripts')

      {!! Html::script('js/parsley.min.js') !!}

@endsection 
    


<!--    
    

{!! Form::open(['route' => 'posts.store' , 'data-parsley-vaidate'=> '']) !!}
        @csrf
        {{ Form::label('title' , 'Title :')}}
        {{ Form::text('title',null,['class' => 'form-control' , 'required'=>'' ] )}}

        {{ Form::label('body' , 'Post Body :')}}
        {{ Form::textarea('body',null,['class' => 'form-control' ,'required'=>''])}}

        {{ Form::submit('Create Post' , ['class' => 'btn btn-success btn-lg btn-block' , 'style' =>'margin-top:20px;'])}}
        {!! Form::close() !!}
    
      -->

     
        
    