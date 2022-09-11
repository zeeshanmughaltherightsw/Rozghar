@extends('layouts.app')
@section('breadcrumb')
{{$post->title}}
@endsection
@section('content')

<!--/ Job_area  -->

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="{{asset($post->image)}}" width="50px" height="50px" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="#">
                                    <h4>{{ $post->title}}</h4>
                                </a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i>{{$post->location->name}}</p>
                                    </div>
                                    <div class="location">
                                        <p> <i class="fa fa-clock-o"></i>{{Carbon\Carbon::parse($post->last_date)->format("D d M Y  ")}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Job description</h4>
                    </div>
                    {!! $post->description !!}<br><br>
                    @if($post->image)
                        <img src="{{asset($post->image)}}">
                    @endif
                </div>
                @if ($post->link)    
                <div class="apply_job_form white-bg">
                    <h4>Apply for the job</h4>
                    <div class="col-md-12">
                        <div class="submit_btn">
                            <a href="{{$post->link}}" class="boxed-btn3 w-100" type="submit">Apply Now</a>
                        </div>
                    </div>

                </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Job Summery</h3>
                    </div>
                    <div class="job_content">

                        <ul>
                            <li>Published on: <span>{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span></li>
                            <li>Vacancy: <span>{{$post->vacancy}} Position</span></li>
                            <li>Salary: <span>{{$post->salary}}</span></li>
                            <li>Location: <span>{{$post->location->name}}</span></li>
                            <li>Last Date: <span> {{Carbon\Carbon::parse($post->last_date)->format("D d M Y  ")}}</span></li>
                        </ul>

                    </div>
                </div>
                <div class="share_wrap d-flex">
                    <span>Share at:</span>
                    <ul>
                        <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                    </ul>
                </div>
                <div class="job_location_wrap">
                    <div class="job_lok_inner">
                        <div id="map" style="height: 200px;"></div>
                        <script>
                            function initMap() {
                                var uluru = {
                                    lat: -25.363,
                                    lng: 131.044
                                };
                                var grayStyles = [{
                                        featureType: "all",
                                        stylers: [{
                                                saturation: -90
                                            },
                                            {
                                                lightness: 50
                                            }
                                        ]
                                    },
                                    {
                                        elementType: 'labels.text.fill',
                                        stylers: [{
                                            color: '#ccdee9'
                                        }]
                                    }
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {
                                        lat: -31.197,
                                        lng: 150.744
                                    },
                                    zoom: 9,
                                    styles: grayStyles,
                                    scrollwheel: false
                                });
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection