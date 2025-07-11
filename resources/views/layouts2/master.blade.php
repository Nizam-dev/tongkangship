<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Kapal Tongkang - @yield('title_page')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <link rel="icon" href="{{asset('theme-admin')}}/assets/images/favicon.svg" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/fonts/feather.css">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/fonts/material.css">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/css/style-preset.css">
    <link rel="stylesheet" href="{{asset('theme-admin')}}/assets/css/plugins/dataTables.bootstrap5.min.css">

    @stack('css')

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        @include('layouts2.sidebar')
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        @include('layouts2.navbar')
    </header>
    <!-- [ Header ] end -->



    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">@yield('title_page')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')

        </div>
    </div>
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm my-1">
                    <p class="m-0">Kapal Tongkang &#9829; crafted by Team.</p>
                </div>
                <div class="col-auto my-1">
                    <ul class="list-inline footer-link mb-0">
                        <li class="list-inline-item"><a href="#">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- [Page Specific JS] start -->
    <script src="{{asset('theme-admin')}}/assets/js/plugins/apexcharts.min.js"></script>
    <!-- <script src="{{asset('theme-admin')}}/assets/js/pages/dashboard-default.js"></script> -->
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{asset('theme-admin')}}/assets/js/plugins/popper.min.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/plugins/simplebar.min.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/plugins/bootstrap.min.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/fonts/custom-font.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/pcoded.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/plugins/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="{{asset('theme-admin')}}/assets/js/plugins/dataTables.bootstrap5.min.js"></script>


    <script>
        layout_change('light');
    </script>




    <script>
        change_box_container('false');
    </script>



    <script>
        layout_rtl_change('false');
    </script>


    <script>
        preset_change("preset-1");
    </script>


    <script>
        font_change("Public-Sans");
    </script>
    @include('layouts.notif')
    @stack('js')


</body>
<!-- [Body] end -->

</html>