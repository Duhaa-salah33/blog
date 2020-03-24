<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
    public function getSlug($slug)
    {
        $post =Post::where('slug', '=', $slug)->first();

        return view('blog.single')->with('post',$post);
    }   

    public function getIndex()
    {
        $post =Post::paginate(5);

        return view('blog.index')->with('post',$post);
    }
}
