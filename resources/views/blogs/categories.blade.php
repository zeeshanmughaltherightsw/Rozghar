@extends('layouts.app')
@section('breadcrumb')
{{ $category->name . $page_title }}
@endsection
@section('content')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach ($blogs as $post)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ $post->created_at->format('d') }}</h3>
                                    <p>{{ $post->created_at->format('M') }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('blog.post', $post->slug) }}">
                                    <h2>{{ $post->title }}</h2>
                                </a>
                                <p>{!! substr($post->short_description,0, 300) !!}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $post->blogCategory->name }}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    @endforeach

                    {{ $blogs->links('vendor.pagination.default') }}
                </div>
            </div>
            @include('partials.blog_sidebar')
        </div>
    </div>
</section>
@endsection
