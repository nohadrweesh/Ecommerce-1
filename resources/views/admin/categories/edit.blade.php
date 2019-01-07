@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="{{url('admin/category')}}" >Categories</a><a href="#" class="current">Edit Category</a> </div>
            <h1>Categories</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Category</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{url('admin/category/'.$category->id)}}" name="edit_category" id="edit_category" novalidate="novalidate">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PUT">
                                <div class="control-group">
                                    <label class="control-label">Category Name</label>
                                    <div class="controls">
                                        <input type="text" name="category_name" id="category_name" value="{{$category->category_name}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Category Level</label>
                                    <div class="controls">
                                        <select name="category_level" id="category_level">
                                            @if($category->parent_id==0)
                                                <option value="0" selected>Main Category</option>
                                            @else
                                                <option value="0" >Main Category</option>
                                            @endif
                                            @foreach($categories as $val=>$key)
                                                <option value="{{$key}}" @if($category->parent_id==$key) selected @endif >{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="category_description" id="category_description" cols="30" rows="3">{{$category->category_description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Url</label>
                                    <div class="controls">
                                        <input type="text" name="category_url" id="category_url" value="{{$category->category_url}}">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Edit Category" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection