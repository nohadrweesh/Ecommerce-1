<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('id','category_name');
        return view('admin.products.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());

        $product=new Product;
        $product->product_name=$request['product_name'];
        $product->product_code=$request['product_code'];
        $product->product_color=$request['product_color'];
        $product->product_description=$request['product_description'];
        $product->product_price=$request['product_price'];
        $product->category_id=$request['category_id'];
        $image_name=GlobalController::upload([
            'file'=>'image',
            'path'=>'products'
        ]);
        $product->product_image=$image_name;
        $product->save();
        return redirect('admin/product')->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product=Product::find($id);
        return view('admin.products.show',compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=Product::find($id);
        $categories=Category::pluck('id','category_name');
        return view('admin.products.edit',compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->product_name=$request['product_name'];
        $product->product_code=$request['product_code'];
        $product->product_color=$request['product_color'];
        $product->product_description=$request['product_description'];
        $product->product_price=$request['product_price'];
        $product->category_id=$request['category_id'];
        $image_name=GlobalController::upload([
            'file'=>'image',
            'path'=>'products',
            'delete_file'=>$product->product_image
        ]);
        $product->product_image=$image_name;
        $product->update();
        return redirect('admin/product')->with('success','Product added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        GlobalController::upload([
            'file'=>'',
            'path'=>'products',
            'delete_file'=>$product->product_image
        ]);
        $product->delete();
        return redirect('/admin/product')->with('success','Product deleted successfully');
    }

    public function addProductAttribute(Request $request){

        foreach ($request['sku'] as $key=>$sku){
            try{
                $product_attribute=new ProductAttribute;
                $product_attribute->product_id=$request['product_id'];
                $product_attribute->stock=$request['stock'][$key];
                $product_attribute->price=$request['price'][$key];
                $product_attribute->size=$request['size'][$key];
                $product_attribute->sku=$sku;
                $product_attribute->save();

            }catch (\Exception $e){
                dd($e,$request->all(),$request['sku'][$key][0]);
            }


        }
        return redirect('/admin/product/'.$request['product_id'])->with('success','Product Details added successfully');

    }
    public function destroyProductAttribute($id){
        //dd(ProductAttribute::get());
        $productAttr=ProductAttribute::find($id);
        //dd($id,$productAttr);
        $product_id=$productAttr->product_id;
        $productAttr->delete();
        return redirect('admin/product/'.$product_id)->with('success','Product Attribute deletedsuccessfully');
    }
}
