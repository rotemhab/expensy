<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','expensy')
    </title>

    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    @yield('head')

</head>
<body>
 <!-- Top Bar Start -->
    <div id="wrapper">
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo">
                            <i class="zmdi zmdi-toys icon-c-logo"></i><span>Expensy</span>
                            <!--<span><img src="assets/images/logo.png" alt="logo" style="height: 20px;"></span>-->
                        </a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
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