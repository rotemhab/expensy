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
			<!-- Right content -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-pills nav-pills-custom display-xs-none pull-right">
                                    <li role="presentation"><a href="#">Today</a></li>
                                    <li role="presentation" class="active"><a href="#">Yesterday</a></li>
                                    <li role="presentation"><a href="#">Last Week</a></li>
                                </ul>

                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>

                                    <h4 class="header-title m-t-0">Daily Sales</h4>


                                    <div class="row text-center m-t-30">
                                        <div class="col-xs-6">
                                            <h3 data-plugin="counterup">8,459</h3>
                                            <p class="text-muted text-overflow">Total Sales</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <h3 data-plugin="counterup">584</h3>
                                            <p class="text-muted text-overflow">Open Compaign</p>
                                        </div>
                                    </div>

                                    <div class="text-center m-t-10">
                                        <div id="morris-donut-example" style="height: 245px;"></div>
                                        <ul class="list-inline chart-detail-list m-b-0">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #42a5f5;"></i>Series A</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #64b5f6;"></i>Series B</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="header-title m-t-0">Statistics</h4>

                                    <div class="row text-center m-t-30">
                                        <div class="col-xs-4">
                                            <h3 data-plugin="counterup">1,507</h3>
                                            <p class="text-muted text-overflow">Total Sales</p>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3 data-plugin="counterup">916</h3>
                                            <p class="text-muted text-overflow" title="Open Compaign">Open Compaign</p>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3 data-plugin="counterup">22</h3>
                                            <p class="text-muted text-overflow">Daily Sales</p>
                                        </div>
                                    </div>

                                    <div id="morris-bar-example" style="height: 280px;" class="m-t-10"></div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="header-title m-t-0">Total Revenue</h4>

                                    <div class="row text-center m-t-30">
                                        <div class="col-xs-6">
                                            <h3 data-plugin="counterup">7,653</h3>
                                            <p class="text-muted text-overflow">Total Sales</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <h3 data-plugin="counterup">852</h3>
                                            <p class="text-muted text-overflow">Open Compaign</p>
                                        </div>
                                    </div>

                                    <div id="morris-line-example" style="height: 280px;" class="m-t-10"></div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->
        </div>

    <footer>
        &copy; {{ date('Y') }}
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')

</body>
</html>