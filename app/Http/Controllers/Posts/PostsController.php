<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; 
use App\Category;  
use App\Tag; 
use Auth;
class PostsController extends Controller
{   
    const MAX_POSTS=10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $posts=Post::latest()
                            ->paginate(self::MAX_POSTS); 
    
        return view('blog.index',compact('posts'));
    }

   
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $cats=Category::pluck('name','id'); 
         $tags=Tag::pluck('name','id');
       return view('blog.create',compact('cats','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $valid=$request->validate([  
        'title'=>'required|string', 
        'body'=> 'required' ,
        'category_id'=>'required|integer'
       ]); 
      $valid['slug']=str_slug($valid['title']);  
      $valid['user_id']=Auth::user()->id;
      $post=Post::create($valid); 
      if(count(request('tags'))) 
      {
        $post->tags()->attach(request('tags'));
      }
       return redirect('/posts')->with('success','Post was added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       
        return view('blog.show',compact('post'))->with('info', 'Thanks for registering!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   $tags=Tag::pluck('name','id');
        return view('blog.edit',compact('post','tags')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $valid=$request->validate([   
            'id'=>'required|integer',
        'title'=>'required|string', 
        'body'=> 'required'
       ]);  
        $post=POST::find($valid['id']); 
        $post->title=$valid['title'];  
        $post->body=$valid['body'];  
        $post->save(); 
        return redirect('/posts/'.$post->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()) 
            {  
                return back()->with('success','Post was deleted');
            } 
            else  
            {  
                return back()->with('error','there was a problem with deleting');
            }
    }
}
