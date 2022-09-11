@extends('layouts.app')
@section('breadcrumb')
{{count($posts)}}+ Find Your Dream Job
@endsection
@section('content')


<!-- catagory_area -->
<div class="catagory_area">
    <div class="container">
        <form action="{{route('search')}}">
            <div class="row cat_search">
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <input type="text" name="keyword" placeholder="Search keyword" value="{{request()->input('keyword')}}">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide" name="location">
                            <option data-display="Location" value="">Location</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}" @if(request()->input('location') == $location->id) selected @endif>{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide" name="category_id">
                            <option data-display="Category" value="">Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if(request()->input('category') == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="job_btn">
                        <button class="boxed-btn3">Find Job</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-12">
                <div class="popular_search d-flex align-items-center">
                    <span>Popular Search:</span>
                    <ul>
                        <li><a href="#">Design & Creative</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Administration</a></li>
                        <li><a href="#">Teaching & Education</a></li>
                        <li><a href="#">Engineering</a></li>
                        <li><a href="#">Software & Web</a></li>
                        <li><a href="#">Telemarketing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ catagory_area -->

<!-- job_listing_area_start  -->
@if(count($govtJobs) > 0)
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Govt Job Listing</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="{{route('search', 'govt-job')}}" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                @foreach ($govtJobs as $post)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <a href="job_details.html"><h4>{{ $post->title }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $post->location->name }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $post->category->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="{{ route('post.detail' , $post->slug) }}" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>{{Carbon\Carbon::parse(Carbon\Carbon::parse($post->created_at)->diffForHumans())->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@if(count($privateJobs) > 0)
<!-- job_listing_area_end  -->
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Private job Listing</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="{{route('search', 'private-job')}}" class="boxed-btn4">Browse More Job</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                @foreach ($privateJobs as $post)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <a href="job_details.html"><h4>{{ $post->title }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $post->location->name }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $post->category->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="{{ route('post.detail' , $post->slug) }}" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@endsection
