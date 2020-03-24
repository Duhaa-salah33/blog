@extends('main')

@section('title','|All Categories')

@section('content')

<div class="row"> 
    <div class="col-md-10">
        <h1>All Categories</h1>
    </div>

    <div class="col-md-10">
    <a href="{{ route('category.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Category</a>
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
                        @foreach($category as $cat)
                      <tr>
                      <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->name }}</td>
                      <td> <a href="{{ route('category.show',$cat->id) }}" class="btn btn-primary">View</a>  <a href="{{ route('category.edit' , $cat->id) }}" class="btn btn-danger">Edit</a> </td>
                      </tr>
                      @endforeach
                      <tr>
                    </tbody> 
                  </table>
    </div>
</div>


@endsection 