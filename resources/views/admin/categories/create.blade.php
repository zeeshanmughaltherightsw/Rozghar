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
                <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group m-b-20">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-b-20">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="form-control" name="parent_id" id="categories" value="{{ old('parent_id') }}">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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