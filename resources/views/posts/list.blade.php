@extends('layouts.app')
@section('breadcrumb')
{{$posts->total()}}+ jobs
@endsection
@section('content')
   <!-- job_listing_area_start  -->
   <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="{{route('search')}}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" placeholder="Search keyword" value="{{request()->input('keyword')}}" name="keyword">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="location">
                                                <option data-display="All location" value="">All location</option>       
                                                @foreach ($locations as $location)
                                                    <option value="{{$location->id}}" @if(request()->input('location') == $location->id) selected @endif>{{$location->name}}</option>        
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="category_id">
                                                <option data-display="All category" value="">All category</option>
                                                @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}" @if(request()->input('category_id') == $cat->id) selected @endif>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="reset_btn">
                                    <button  class="boxed-btn3 w-100" type="submit">Apply</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            @forelse ($posts as $post)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        @if($post->image)
                                            <div class="thumb">
                                                <img width="50px" height="50px" src="{{asset($post->image)}}" alt="{{$post->title}}">
                                            </div>
                                        @endif
                                        <div class="jobs_conetent">
                                            <a href="job_details.html"><h4>{{$post->title}}</h4></a>
                                            <div class="links_locat d-flex align-items-center">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i>{{$post->location->name}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> {{ $post->category->name }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="{{ route('post.detail', $post->slug) }}" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: {{Carbon\Carbon::parse($post->last_date)->format("D d M Y  ")}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                No jobs availabe
                            @endforelse
                        </div>
                        {{$posts->links('vendor.pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->


@endsection