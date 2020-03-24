@extends('main')

@section('title','| Tag')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

 <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Editing Tag</h1>
    <hr>
    <form  action="/tags/{{ $tag->id }}" method="POST" data-parsley-vaidate="">
        @method('PATCH')
    
        @csrf
        
         <div class="form-group m-2">
              <label for="titlelabel">Name :</label>
         <input type="text" name="name" class="form-control" id="titlelabel" placeholder="name..." value="{{ $tag->name }}"  required>
              <hr>
              
              <div class="row">

                <div class="col-sm-3">
                <a href="{{ route('tags.show',$tag->id) }}" class="btn btn-primary  btn-block">Cancel</a>
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
    
    
    @section('scripts')
    
          {!! Html::script('js/parsley.min.js') !!}
    
    @endsection 