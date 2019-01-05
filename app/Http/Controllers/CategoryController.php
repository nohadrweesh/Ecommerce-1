<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::pluck('id','category_name');
        return view('admin.categories.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category =new Category;
        $category->category_name=$request['category_name'];
        $category->category_description=$request['category_description'];
        $category->parent_id=$request['category_level'];
        $category->category_url=$request['category_url'];
        $category->save();
        return redirect('/admin/category')->with('success','Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        $categories=Category::pluck('id','category_name');
        return view('admin.categories.edit',compact(['category','categories']));
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
        //
        $category=Category::find($id);
        $category->category_name=$request['category_name'];
        $category->category_description=$request['category_description'];
        $category->parent_id=$request['category_level'];
        $category->category_url=$request['category_url'];
        $category->update();
        return redirect('/admin/category')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $category=Category::find($id);
        $category->delete();
        return redirect('/admin/category')->with('success','Category deleted successfully');

    }
}
