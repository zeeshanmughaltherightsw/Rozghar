<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{route('home')}}">
                                    <img src="{{asset('img/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <li><a href="{{ route('search', $category->slug)}}">{{ $category->name }}  @if(count($category->subCategory) > 0)<i class="ti-angle-down"></i>@endif </a>
                                                @if(count($category->subCategory) > 0)
                                                    <ul class="submenu">
                                                    @foreach ($category->subCategory as $subCategory)
                                                        <li><a href="{{ route('search', $subCategory->slug) }}">{{ $subCategory->name }}</a></li>
                                                    @endforeach
                                                    </ul>
                                                @endif
                                                </li>
                                            @endforeach
                                        @endif
                                        <li><a href="{{ route('blog.index') }}">{{ __('Blogs') }} <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                @foreach ($mbc as $cat)
                                                    <li>
                                                        <a href="{{ route('blog.category', $cat->slug) }}">{{ $cat->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
