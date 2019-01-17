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
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/product/image')}}" name="add_product_attr" id="add_product_attr" novalidate="novalidate">
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
                                <div class="control-group ">
                                    <label class="control-label">Product Images</label>
                                    <div class="controls">
                                    <div >
                                        <input name="image[]" id="image" type="file" multiple="" size="19"style="opacity: 100 !important;" >


                                </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Add Product Images" class="btn btn-success">
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
                            <h5>ProductImages</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Product Image Id</th>
                                    <th>Image</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product->productImages as $image)

                                    <tr class="gradeU">
                                        <td>{{$image->id}}</td>
                                         <td><img  width="60px" src="{{asset('storage/products/small/'.$image->product_image)}}" alt=""></td>


                                        <td>

                                            <a rel="{{ $image->id }}" rel1="delete-product-image" href="javascript:" class="deleteRecord btn btn-danger btn-mini">Delete</a>
                                           
                                        </td>

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
