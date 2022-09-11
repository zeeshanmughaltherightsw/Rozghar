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
                        All Jobs
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
    <div class="col-md-12">
        <div class="demo-box m-t-20">
            <div class="m-b-30">
                <a href="{{route('admin.posts.create')}}">
                    <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></button>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table m-0 table-colored-bordered table-bordered-primary table table-striped table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Salary</th>
                            <th>Education</th>
                            <th>Vacancy</th>
                            <th>Last date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->title }}</th>
                            <td>{{ $post->salary }}</td>
                            <td>{{ $post->education }}</td>
                            <td>{{ $post->vacancy }}</td>
                            <td>{{ \Carbon\Carbon::parse($post->last_date)->format('D-M-Y') }}</td>
                            <td>
                                <button class="btn btn-primary" type="button">
                                    {{ $post->status }}
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button><i class="fa fa-trash-o" style="color: #f05050"></i></button>
                                </form>
                                <!-- <a href=""> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endpush