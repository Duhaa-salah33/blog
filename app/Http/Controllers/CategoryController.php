<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category =  Category::all();
        return view('category.index')->with('category' ,$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
        //store in the database
        //craating an object from Post
        $category = new Category;

        $category->name = $request->name;
        $category->save();  

        Session::flash('success' , 'The Category was successfully save!');

        return redirect()->route('category.show' , $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category =  Category::find($id);
        return view('category.show' )->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        return view('category.edit')->with('category',$category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , array(
            'name' => 'required | max:50',
         ));

        $category =  Category::find($id);
        
        $category->name = $request->input('name');
        $category->save();
        Session::flash('success', 'This Category successfully updated !');
        return redirect()->route('category.show',$category->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::find($id);

        $category->delete();

        return redirect()->route('category.index');
    }
}
