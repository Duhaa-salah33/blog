@extends('main')

@section('title','| Homepage')


@section('content')
<!-- a default nav bar -->
<div class="row">
            <div class="col-md-12">
            <div class="jumbotron">
  <h1 class="display-4">Welcome to my Laravel blog</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
            </div>
        </div>
</div>

<div class="row">
        <div class="col-md-8">

            @foreach ($post as $p)

            <div class="post">
                    <h3>{{ $p->title }}</h3>
            <p>{{ substr($p->body , 0 ,20) }}{{ strlen($p->body) > 20 ? "..." :""}}</p>
            <a href="{{ url('blog/'.$p->slug) }}" class="btn btn-primary">Read More</a>
                </div>
    
            @endforeach

            
        
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>

        <div class="text-center" style="text-align: center">
                <br>
            {!! $post->links(); !!}
           </div>
</div>
@endsection

