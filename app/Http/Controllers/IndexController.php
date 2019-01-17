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
        if($category==null)
            abort(404);
        if($category->parent_id==0){
            //main cat
           // dd($category);
            $products=Product::query()->where('category_id',$category->id)->orWhereIn('category_id',function ($q)use ($category){
                $q->select('id')->from('categories')->where('parent_id',$category->id);
            })->get();
           // dd($products);

        }else{
            $products=Product::query()->whereIn('category_id',function ($q)use ($url){
            $q->select('id')->from('categories')->where('category_url',$url);
        })->get();
        }
        
        $category_name=$category->category_name;

        $categories=Category::where('parent_id',0)->get();
        return view('front.listing',compact(['category_name','products','categories']));
    }

    public function getProductById($product_id)
    {
        $product=Product::find($product_id);
        $categories=Category::where('parent_id',0)->get();
        $recommendedItems=Product::where('id','!=',$product_id)->where('category_id',$product->category_id)->get();
        return view('front.product',compact(['product','categories','recommendedItems']));
    }
}
