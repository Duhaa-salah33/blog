@extends('main')

@section('title','|Edit Category')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

 <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Category</h1>
    <hr>
    <form  action="/category/{{ $category->id }}" method="POST" data-parsley-vaidate="">
    @method('PATCH')
        @csrf
        
         <div class="form-group m-2">
              <label for="titlelabel">Name :</label>
         <input type="text" name="name" class="form-control" id="titlelabel" placeholder="name..." value="{{ $category->name }}" required>
              <hr>
              
              <div class="row">

                <div class="col-sm-6">
                <a href="{{ route('category.show',$category->id) }}" class="btn btn-danger btn-block">Cancel</a>
                </div>

                <div class="col-sm-6">
                   <button class="btn btn-success btn-block" type="submit">Update</button>
                </div>

         </div>
              
          </div>
          
    
        </form>
      
         
     
        </div>
    </div> 
    
    @endsection
    
    
    @section('scripts')
    
          {!! Html::script('js/parsley.min.js') !!}
    
    @endsection 