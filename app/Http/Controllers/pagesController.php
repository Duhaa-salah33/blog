<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class pagesController extends Controller
{

    public function getIndex()
    {
        $post = Post::orderBy('created_at' , 'desc')->paginate(4);
        return view('pages.welcome')->with('post',$post);
    }

    public function getAbout()
    {
        return view('pages.about');
        
    }

    public function getContact()
    {
    return view('pages.contact');/*, compact(['email'],['fullname']) */

    }    

   // public function getIndex(){} 
 

}
