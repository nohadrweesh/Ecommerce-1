@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="#" class="current">Products</a> </div>
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

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Product Color</th>
                                    <th>Product Code</th>
                                    <th>Products Description</th>
                                    <th>Products Price</th>
                                    <th>Category Id</th>
                                    <th>Product Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)

                                    <tr class="gradeU">
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_color}}</td>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->product_description}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>{{$product->category_id}}</td>
                                        <td><img  width="60px" src="{{asset('storage/products/small/'.$product->product_image)}}" alt=""></td>


                                        <td>
                                            <a href="{{url('/admin/product/'.$product->id)}}" class="btn btn-success btn-mini">View</a>
                                            <a href="{{url('/admin/product/'.$product->id.'/edit')}}" class="btn btn-primary btn-mini">Edit</a>
                                            <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="deleteRecord btn btn-danger btn-mini">Delete</a>
                                            {{--<form id="delete_category" style="display:inline-block;" action="{{url('admin/category/'.$category->id)}}" method="post">--}}
                                                {{--{{csrf_field()}}--}}
                                                {{--<input name="_method" type="hidden" value="delete">--}}
                                                {{--<input class="btn btn-danger btn-mini" type="submit" value="Delete">--}}

                                            {{--</form>--}}
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