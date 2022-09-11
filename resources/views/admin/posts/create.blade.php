@extends('admin.layouts.master')

@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Jobs</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Admin</a>
                    </li>
                    <li>
                        <a href="#">Jobs </a>
                    </li>
                    <li class="active">
                        Create jobs
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
                <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
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
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="sub-cat">Sub Govt Category</label>
                                <select class="form-control" name="category_id" value="{{ old('category_id') }}" id="subCat" required>
                                    <option value="" selected disabled>Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-b-20">
                                <label for="salary">Salary</label>
                                <input type="number" step="0.1" class="form-control" id="salary" value="{{ old('salary') }}" name="salary" placeholder="Enter Salary">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-b-20">
                                <label for="exampleInputEmail1">Job Vacancy</label>
                                <input type="number" class="form-control" id="vacancy" value="{{ old('vacancy') }}"  name="vacancy" placeholder="Enter Vacancy">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-b-20">
                            <label for="location">Job Location</label>
                            <select class="form-control" value="{{ old('city_id') }}" name="city_id" required>
                            @php
                                $cities = DB::table('cities')->where('country_id', 1)->get();
                            @endphp
                            @foreach ($cities as $city)
                                <option value="" selected disabled>Select Location</option>
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="education">Education</label>
                                <input type="text" class="form-control" value="{{ old('education') }}" id="education" name="education" placeholder="Enter Education">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="last_date">Last date</label>
                                <input type="date" class="form-control" id="last_date" value="{{ old('last_date') }}" name="last_date" placeholder="Last date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Post Short Details</b></h4>
                                <textarea rows="5"  name="note" id="note" value="{{ old('note') }}"></textarea>
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
                                <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                                <input type="file" class="form-control" value="{{ old('image') }}"  id="postimage" name="image" required>
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label for="exampleInputEmail1">Job Button Link</label>
                            <input type="text" class="form-control" value="{{ old('link') }}" id="link" name="link" placeholder="Enter Job Link">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
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
            let url = "{{route('admin.sub-cat', ':id')}}";
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