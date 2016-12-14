<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','expensy')
    </title>

    <meta charset='utf-8'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('head')
</head>
<body>
 <!-- Top Bar Start -->
    <div id="wrapper">
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/" class="logo">
                            <i class="zmdi zmdi-toys icon-c-logo"></i><span>Expensy</span>
                            <!--<span><img src="assets/images/logo.png" alt="logo" style="height: 20px;"></span>-->
                        </a>
                    </div>
                </div>
                
                <div class="navbar navbar-default" role="navigation">
                    <!-- Button mobile view to collapse sidebar menu -->
                    @if(Auth::user())
                    <h4 id="name">Hello, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} | <a href="/logout">logout</a></h4>
                    @endif
                </div>
                
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="/" class="waves-effect">Home</a>
                            </li>
                            <li>
                                <a href="/categories" class="waves-effect">Categories</a>
                            </li>
                            <li>
                                <a href="/search" class="waves-effect">Search</a>
                            </li>
                            <li>
                                <a href="/upload" class="waves-effect">Upload</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
			<!-- Left Sidebar End -->


            <!-- ============================================================== -->
			<!-- content -->
			<!-- ============================================================== -->
			@yield('content')
            

    <footer>
        &copy; {{ date('Y') }}
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')

</body>
</html>