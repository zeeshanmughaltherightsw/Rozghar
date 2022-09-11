@extends('admin.layouts.master')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Categories</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Admin</a>
                    </li>
                    <li>
                        <a href="#">Jobs </a>
                    </li>
                    <li class="active">
                        Edit Categories
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="p-6">
            <div class="">
                <form action="{{route('admin.blog-categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $category->name }}" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-b-20">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="form-control" name="parent_id" id="parent_id">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($blogCategories as $cat)
                                        @if($cat->id != $category->id)
                                            <option value="{{$cat->id}}" @if ($category->parents && $category->parents->id == $cat->id) selected @endif>{{$cat->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                </form>
            </div>
        </div> <!-- end p-20 -->
    </div> <!-- end col -->
</div>
@endsection
@push('scripts')
<script>
    
</script>
<script>
    
</script>
@endpush
@push('style')
    <style>
 textarea
{
  width:100%;
}
    </style>
@endpush