<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use function foo\func;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $products=Product::inRandomOrder()->get();
        $categories=Category::where('parent_id',0)->get();
        return view('front.index',compact(['products','categories']));
    }

    public function getProductsByCategoryUrl($url=null){
        $category=Category::where('category_url',$url)->first();
        $products=Product::query()->whereIn('category_id',function ($q)use ($url){
            $q->select('id')->from('categories')->where('category_url',$url);
        })->get();
        $category_name=$category->category_name;

        $categories=Category::where('parent_id',0)->get();
        return view('front.listing',compact(['category_name','products','categories']));
    }
}
