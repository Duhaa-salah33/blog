<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
 
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('posts.index')->with('posts' ,$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //we need to validate the data
         $this->validate($request , array(
            'title' => 'required | max:255',
            'body' => 'required' ,
            'category_id' => 'required | integer' ,
            'slug'=>'required|alpha_dash|min:5|max:20'
         ));
        //store in the database
        //craating an object from Post
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        $post->save();  

        Session::flash('success' , 'The blog post was successfully save!');

        return redirect()->route('posts.show' , $post->id);

      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $post = Post::find($id);
        return view('posts.show' )->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories = Category::all();
        return view('posts.edit')->with('post',$post)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->input('slug') == $post->slug)
        {
            $this->validate($request , array(
                'title' => 'required | max:255',
                'category_id' => 'required | integer' ,
                'body' => 'required' 
             ));
        }
        else {
            $this->validate($request , array(
                'title' => 'required | max:255',
                'category_id' => 'required | integer' ,
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required' 
             ));    
        }
        

        $post->title = $request->input('title'); 
        $post->body = $request->input('body'); 
        $post->category_id = $request->input('category_id'); 
        $post->slug = $request->input('slug'); 
        $post->save();

        Session::flash('success', 'This post successfully updated !');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
