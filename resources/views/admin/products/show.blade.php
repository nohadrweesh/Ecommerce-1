@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{url('admin/category')}}" >Products</a><a href="#" class="current">Edit Product</a> </div>
            <h1>Products</h1>
        </div>
        @if(count($errors)>0)

            <ul class="alert alert-danger alert-block" style="margin: 0 auto;">
                <button type="button" data-dismiss="alert" class="close">x</button>
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none;">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" data-dismiss="alert" class="close">x</button>
                {{session()->get('success')}}
            </div>
        @endif

        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Product</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/product/attribute')}}" name="add_product_attr" id="add_product_attr" novalidate="novalidate">
                                {{csrf_field()}}

                                <input name="product_id" type="hidden" value="{{$product->id}}">

                                <div class="control-group">
                                    <label class="control-label">Under Category</label>

                                    <label  class="control-label"> <strong>{{$product->category->category_name}}</strong></label>

                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product Name</label>
                                    <label  class="control-label"> <strong>{{$product->product_name}}</strong></label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Code</label>
                                    <label  class="control-label"> <strong>{{$product->product_code}}</strong></label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Color</label>
                                    <label  class="control-label"> <strong>{{$product->product_color}}</strong></label>

                                </div>
                                @if($product->product_description!=null)

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <label  class="control-label"> <strong>{{$product->product_description}}</strong></label>

                                </div> 
                                @endif
                                 <div class="control-group">
                                    <label class="control-label">Material & Care</label>
                                    <label  class="control-label"> <strong>{{$product->product_care}}</strong></label>

                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Product Price</label>
                                    <label  class="control-label"> <strong>{{$product->product_price}}</strong></label>

                                </div>
                                @if($product->product_image)
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <label class="control-label"><img  width="60px" src="{{asset('storage/products/small/'.$product->product_image)}}" alt=""></label>


                                </div>
                                @endif
                                <div class="control-group field_wrapper">
                                    <label class="control-label">Product Attributes</label>
                                    <div class="controls">
                                        <input required type="text" name="sku[]" placeholder="sku"/>
                                        <input required type="text" name="size[]" placeholder="size"/>
                                        <input required type="text" name="price[]" placeholder="price"/>
                                        <input required type="text" name="stock[]" placeholder="stock"/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Add Product Attributes" class="btn btn-success">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Product Attributes</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Attribute Id</th>
                                    <th>Sku</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($product->productAttributes as $attribute)
                                 

                                    <tr class="gradeU">
                                        <form  action="{{url('admin/product/'.$product->id.'/attribute') }}" method="post">
                                            {{csrf_field()}}
                                        <td><input type="hidden" name="attribute_id" value="{{$attribute->id}}">{{$attribute->id}}</td>
                                        <td><input type="text" name="old_sku" value="{{$attribute->sku}}"></td>
                                        <td><input type="text" name="old_size" value="{{$attribute->size}}"></td>
                                        <td><input type="text"  name="old_price" value="{{$attribute->price}}"></td>
                                        <td><input type="text"  name="old_stock"value="{{$attribute->stock}}"></td>


                                        <td>
                                           
                                           
                                            <input class="btn btn-primary btn-mini" type="submit" value="Update">


                                            <a rel="{{ $attribute->id }}" rel1="delete-product-attribute" href="javascript:" class="deleteRecord btn btn-danger btn-mini">Delete</a>
                                            
                                        </td>
 </form>
                                    </tr>
                                @endforeach

                                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
