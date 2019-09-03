 @extends('layouts.app') 
 @section('content')  
 <!-- Blog Entries Column --> 
 <div class="container">
  <div class="row">
      <div class="col-md-8">

        <h1 class="my-4">WDD bLOG
          <small>Secondary Text</small>
        </h1>
       
        <!-- Blog Post -->
      
        @foreach($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
          
          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>  
            <p><span>Posted in :<a href="/posts/category/{{$post->category->name}}">{{$post->category->name}}</a></span> </p> 
            @if(count($post->tags)) 
            <p>Tags 
            @foreach($post->tags as $tag)  
            <a href="/posts/tag/{{$tag->name}}">{{$tag->name}}</a> &nbsp;&nbsp; 
            @endforeach
            </p>
            @endif
             @if(Auth::check())
            <p><a href="/posts/edit/{{$post->slug}}">Edit</a></p>
             @endif
            <p><a href="/posts/{{$post->slug}}" class="btn btn-primary">Read More </a> </p>  
              &nbsp;  &nbsp; 
              <form class="form from-inline" action='/posts/{{$post->slug}}' method="post">  
                @csrf 
                @method('DELETE') 
                <button class="form-inline btn btn-sm btn-danger">delete</button>
              </form>
          </div>
          <div class="card-footer text-muted">
            Posted on {{$post->created_at}}
            <a href="#">{{$post->user->name}}</a>
          </div>
        </div>

        @endforeach

        <!-- Pagination -->
        {!!$posts->links()!!}

      </div>    
      @include('partial.sidebar')
    </div>
      
    </div>
@endsection