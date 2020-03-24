@extends('main')

@section('title','|Create New Tag')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

 <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Tag</h1>
    <hr>
    <form  action="/tags" method="POST" data-parsley-vaidate="">
    
        @csrf
        
         <div class="form-group m-2">
              <label for="titlelabel">Name :</label>
              <input type="text" name="name" class="form-control" id="titlelabel" placeholder="name..."  required>
              <hr>
              <button type="submit" class="form-control btn btn-success btn-lg btn-block">Create Tag</button>
          </div>
          
    
        </form>
      
         
     
        </div>
    </div> 
    
    @endsection
    
    
    @section('scripts')
    
          {!! Html::script('js/parsley.min.js') !!}
    
    @endsection 