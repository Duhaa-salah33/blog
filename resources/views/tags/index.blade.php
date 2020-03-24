@extends('main')

@section('title','|All Tags')

@section('content')

<div class="row"> 
    <div class="col-md-10">
        <h1>All Tags</h1>
    </div>

    <div class="col-md-10">
    <a href="{{ route('tags.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Tag</a>
    </div>
    <hr>
</div><br> 
<div class="row">
    <div class="col-md-10">
            <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($tag as $t)
                      <tr>
                      <th scope="row">{{ $t->id }}</th>
                        <td>{{ $t->name }}</td>
                      <td> <a href="{{ route('tags.show',$t->id) }}" class="btn btn-primary">View</a>  <a href="{{ route('tags.edit' , $t->id) }}" class="btn btn-danger">Edit</a> 
                      </td>
                      </tr>
                      @endforeach
                      <tr>
                    </tbody> 
                  </table>
    </div>
</div>


@endsection 