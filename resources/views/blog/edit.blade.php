 @extends('layouts.app') 
 @section('content')  
<div class="container"> 
  <div class="row">
  <h2>Vertical (basic) form</h2> 
 @include('partial.errors')
  <form action="/posts" method="post"> 
    @csrf 
    @method('PUT');
    <input type="hidden" name="id" value="{{$post->id}}">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter Title" value="{{old('title',$post->title)}}"name="title"> 
       @if($errors->has('title'))
      <span class="error text-danger">{{$errors->first('title')}}</span> 
      @endif
    </div>
    <div class="form-group">
      <label for="slug">Slug:</label>
      <input type="text" class="form-control" id="slug" placeholder="Enter Slug" value="{{old('slug',$post->slug)}}" name="slug">
    </div> 
    <div class="form-group">
      <label for="body">body:</label>
      <input type="text" class="form-control" id="body" placeholder="Enter Body" value="{{old('body',$post->body)}}"name="body"> 
       @if($errors->has('body'))
      <span class="error text-danger">{{$errors->first('body')}}</span> 
      @endif
    </div>  
     <div class="form-group"> 
      <label for="tags">Tags</label>    
      @foreach($tags as $key =>$value)  
      @php 

      if(array_key_exists($key,$post->tags->toArray()))  {  
      $checked='checked';
    } 
    else 
    {  
       $checked='';
    }
     @endphp
      <input type="checkbox" name="tags[]" value="{{$key}}">&nbsp;{{$value}}&nbsp;&nbsp; 
      @endforeach
    </div>
  
    
    <button type="Update" class="btn btn-default">Submit</button>
  </form> 
  @include('partial.sidebar') 
</div> 
</div>
@endsection