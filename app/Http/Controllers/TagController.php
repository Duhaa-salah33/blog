<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();
        return view('tags.index')->with('tag',$tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , array(
            'name' => 'required | max:50',
         ));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->created_at = $request->created_at;
        $tag->updated_at = $request->updated_at;
        $tag->save();

        Session::flash('success' , 'The Tag was successfully save!');

        return redirect()->route('tags.show',$tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->with('tag',$tag);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , array(
            'name' => 'required | max:50',
         ));
         $tag = Tag::find($id);
         $tag->name = $request->input('name');
         $tag->save();
         Session::flash('success' , 'The Tag was successfully Updated!');
         return redirect()->route('tags.show' ,$tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->delete(); 

        return redirect()->route('tags.index');
    }
}
