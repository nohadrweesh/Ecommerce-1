@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="#" class="current">Categories</a> </div>
            <h1>Categories</h1>
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
                            <h5>Categories</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>Category Parent</th>
                                    <th>Category Description</th>
                                    <th>Category Url</th>
                                    <th>CActions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)

                                    <tr class="gradeU">
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->parent_id}}</td>
                                        <td>{{$category->category_description}}</td>
                                        <td>{{$category->category_url}}</td>
                                        <td>
                                            <a href="{{url('/admin/category/'.$category->id.'/edit')}}" class="btn btn-primary btn-mini">Edit</a>
                                            <a rel="{{ $category->id }}" rel1="delete-category" href="javascript:" class="deleteRecord btn btn-danger btn-mini">Delete</a>
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