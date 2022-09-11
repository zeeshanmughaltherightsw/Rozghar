<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ $page_title }} | RozgharPk</title>
    <meta charset="utf-8">
    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/datatable.min.css') }}" rel="stylesheet" type="text/css" />
    @stack('style')
    <style>
        .paginate_button {
            padding: 5px;
        }
    </style>
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        @include('partials.notify')
        @auth
            <!-- Top navbar -->
            @include('admin.partials.topnav')
            <!-- Top Bar Start -->
            <!-- Sidebar -->
            @include('admin.partials.sidenav')
        @endauth
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    @yield('breadcrumb')
                    @yield('content')
                </div> <!-- container -->
            </div> <!-- content -->
            @include('admin.partials.footer')
        </div>
    </div>
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/detect.js') }}"></script>
    <script src="{{ asset('admin/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable.js') }}"></script>
    @stack('scripts')
</body>