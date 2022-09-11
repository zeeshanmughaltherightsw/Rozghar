@extends('layouts.app')
@section('breadcrumb')
{{ $page_title = $post->title }}
@endsection

@section('content')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                </div>
                <div class="blog_details">
                   <h2>{{ $post->title }}</h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="{{ route('blog.category', $post->blogCategory->slug) }}"><i class="fa fa-user"></i> {{ $post->blogCategory->name }}</a></li>
                      {{-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> --}}
                   </ul>
                   {{ $post->description }}
                </div>
             </div>
             <div class="navigation-top">
                {{-- <div class="d-sm-flex justify-content-between text-center">
                   <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                      people like this</p>
                   <div class="col-sm-4 text-center my-2 my-sm-0">
                      <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                   </div>
                   <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                   </ul>
                </div> --}}
                <div class="navigation-area">
                   <div class="row">
                    @if(isset($previous_record))
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                         <div class="thumb">
                            <a href="{{ route('blog.post', $previous_record->slug) }}">
                               <img class="img-fluid" width="200px" src="{{ asset($previous_record->image) }}" alt="{{ $previous_record->name }}">
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="{{ route('blog.post', $previous_record->slug) }}">
                               <span class="lnr text-white ti-arrow-left"></span>
                            </a>
                         </div>
                         <div class="detials">
                            <p>Prev Post</p>
                            <a href="{{ route('blog.post', $previous_record->slug) }}">
                               <h4>{{ substr($previous_record->title, 0, 20) }}</h4>
                            </a>
                         </div>
                      </div>
                      @endif
                      @if(isset($next_record))
                      <div
                         class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                         <div class="detials">
                            <p>Next Post</p>
                            <a href="{{ route('blog.post', $next_record->slug) }}">
                               <h4>{{ substr($next_record->title, 0, 20) }}</h4>
                            </a>
                         </div>
                         <div class="arrow">
                            <a href="{{ route('blog.post', $next_record->slug) }}">
                               <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                         </div>
                         <div class="thumb">
                            <a href="{{ route('blog.post', $next_record->slug) }}">
                               <img class="img-fluid" width="200px" src="{{ asset($next_record->image) }}" alt="{{ $next_record->title }}">
                            </a>
                         </div>
                      </div>
                      @endif
                   </div>
                </div>
             </div>
          </div>
          @include('partials.blog_sidebar')
       </div>
    </div>
 </section>
@endsection
