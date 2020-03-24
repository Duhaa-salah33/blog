@extends('main')

@section('title','| Blog')

@section('content')

      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>Blog</h1>
          </div>
      </div>
    @foreach($post as $p)
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{$p->title}}</h2>
            <h5>Published : {{ date( 'M j, Y h:ia' , strtotime($p->created_at)) }}</h5>

            <p>{{ substr($p->body , 0 ,20) }}{{ strlen($p->body) > 20 ? "..." :""}}</p>

        <a href="{{ url('blog/'.$p->slug) }}" class="btn btn-primary">Read more</a>

        <hr>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $post->links() !!}
            </div>
        </div>
    </div>

@endsection