 @extends('layouts.app') 
 @section('content')  
<div class="container"> 

  <h2>Vertical (basic) form</h2> 
  @include('partial.errors')
  <form action="/posts" method="post"> 
    @csrf 

    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter Title" value="{{old('title')}}"name="title">  
      @if($errors->has('title'))
      <span class="error text-danger">{{$errors->first('title')}}</span> 
      @endif
    </div>
    <div class="form-group">
      <label for="slug">Slug:</label>
      <input type="text" class="form-control" id="slug" placeholder="Enter Slug" value="{{old('slug')}}" name="slug">
    </div> 
    <div class="form-group">
      <label for="body">body:</label>
      <input type="text" class="form-control" id="body" placeholder="Enter Body" value="{{old('body')}}"name="body"> 
       @if($errors->has('body'))
      <span class="error text-danger">{{$errors->first('body')}}</span> 
      @endif
    </div> 
     <div class="form-group">
      <label for="category_id">Category:</label>
      <select name="category_id">  
        <option value="">Select a Category</option> 
        @foreach($cats as $key=>$value)  
        <option value='{{$key}}' 
        @if($key== old('category_id')) 
          selected 
          @endif>  
      {{$value}}</option>
        @endforeach
      </select> 
       @if($errors->has('body'))
      <span class="error text-danger">{{$errors->first('category_id')}}</span> 
      @endif
    </div> 
    <div class="form-group"> 
      <label for="tags">Tags</label>   
      @foreach($tags as $key =>$value)
      <input type="checkbox" name="tags[]" value="{{$key}}">&nbsp;{{$value}}&nbsp;&nbsp; 
      @endforeach
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection