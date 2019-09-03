 @extends('layouts.app') 
 @section('content')   
 <div class="container"> 
  <div class="row">
<div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1> 


        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>
        <p><span>Posted in :<a href="/posts/category/{{$post->category->name}}">{{$post->category->name}}</a></span> </p>
        <!-- Date/Time -->
        <p>{{$post->created_at->toDayDateTimeString()}}</p> 


        <hr> 

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
      

        <hr>
            @if(Auth::check()) 

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
             <form action="/comments" method="post"> 
              @csrf  
              <input type="hidden" name="post_id" value="{{$post->id}}"/>
              <div class="form-group">
                <textarea class="form-control" rows="3"  placeholder="Enter Title" id="body" name="body"></textarea> 
                @if($errors->has('body'))
               <span class="error text-danger">{{$errors->first('body')}}</span> 
               @endif
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      @else 
      
  <div class="alert  alert-info">  
  <p>User is NOT logged in</p>
  </div>
  
      @endif
        @foreach($post->comments as $comment )
        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="https://gravatar.com/avatar/{{md5($comment->user->email)}}" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->user->name}}</h5>
            {{$comment->body}}
            

          </div>
        </div> 
        @endforeach 


      </div> 
       @include('partial.sidebar') 
     </div> 
   </div> 
  
@endsection