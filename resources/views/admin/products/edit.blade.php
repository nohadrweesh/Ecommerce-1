@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{url('admin/category')}}" >Products</a><a href="#" class="current">Edit Product</a> </div>
            <h1>Products</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Product</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/product/'.$product->id)}}" name="edit_product" id="edit_product" novalidate="novalidate">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PUT">

                                <div class="control-group">
                                    <label class="control-label">Under Category</label>
                                    <div class="controls">
                                        <select name="category_id" id="category_id">

                                            @foreach($categories as $val=>$key)
                                                <option value="{{$key}}" @if($product->category_id==$key) selected @endif >{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product Name</label>
                                    <div class="controls">
                                        <input type="text" name="product_name" id="product_name" value="{{$product->product_name}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Code</label>
                                    <div class="controls">
                                        <input type="text" name="product_code" id="product_code" value="{{$product->product_code}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Color</label>
                                    <div class="controls">
                                        <input type="text" name="product_color" id="product_color" value="{{$product->product_color}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="product_description" id="product_description" cols="30" rows="3">{{$product->product_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                <label class="control-label">Material & Care</label>
                                <div class="controls">
                                    <textarea name="product_care" id="product_care" cols="30" rows="3">
                                        {{$product->product_care}}
                                    </textarea>
                                </div>
                            </div>
                                <div class="control-group">
                                    <label class="control-label">Product Price</label>
                                    <div class="controls">
                                        <input type="text" name="product_price" id="product_price" value="{{$product->product_price}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <div >
                                            <input name="image" id="image" type="file" size="19" style="opacity: 100 !important;" >


                                        </div>
                                    </div>


                                <div class="form-actions">
                                    <input type="submit" value="Edit Product" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection