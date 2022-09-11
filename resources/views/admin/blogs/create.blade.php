@extends('admin.layouts.master')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Blogs</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Admin</a>
                    </li>
                    <li>
                        <a href="#">Blogs</a>
                    </li>
                    <li class="active">
                        Create blog post
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
                <form action="{{route('admin.blogs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group m-b-20">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="form-control" name="category" id="categories" value="{{ old('category') }}" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($blog_categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="sub-cat">Sub Category</label>
                                <select class="form-control" name="blog_category_id" value="{{ old('category_id') }}" id="subCat" required>
                                    <option value="" selected disabled>Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>BLog Short description</b></h4>
                                <textarea rows="5"  name="short_description" id="note" value="{{ old('note') }}"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Post Full Details</b></h4>
                                <textarea rows="5" name="description" value="{{ old('description') }}" id="description" ></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Image</b></h4>
                                <input type="file" class="form-control" value="{{ old('image') }}"  id="postimage" name="image" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Create</button>
                </form>
            </div>
        </div> <!-- end p-20 -->
    </div> <!-- end col -->
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#categories').on('change', function(e){
            $('#subCat')
                .find('option')
                .remove()
                .end()
                .append('<option value="" selected disbaled>Select Sub Category</option>')
                .val('')
            ;
            let url = "{{ route('admin.sub-blog-cat', ':id') }}";
            url = url.replace(':id', e.target.value);
            $.ajax(
                {
                    url: url, 
                    success: function(result){
                        // $("#subCat").html(result);
                        for (i = 0; i < result.length; i++)
                        { 
                            $("#subCat").append(new Option(result[i]['name'], result[i]['id']));
                        }
                    }
                }
            );
        });
    });
</script>
<script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector('#description') )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector('#note') )
        .catch( error => {
            console.error( error );
        } );
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