<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://i.ibb.co/RgJJv3C/home-page-2.webp">
    <!-- Pignose Calender -->
    <link href="{{ asset("backend/admindashboard") }}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset("backend/admindashboard") }}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{ asset("backend/admindashboard") }}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="{{ asset("backend/admindashboard") }}/css/style.css" rel="stylesheet">
    <link href="{{ asset("backend/admindashboard") }}/plugins/summernote/dist/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
    <!--*******************
        Preloader end
        ********************-->


    <!--**********************************
        Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

        <!--**********************************
            Nav header start
            ***********************************-->
            <div class="nav-header">
                <div class="brand-logo">
                    <a href="{{ url('/dashboard') }}">
                        <b class="logo-abbr"><img src="https://monstar-lab.com/global/wp-content/uploads/sites/11/2019/04/male-placeholder-image.jpeg" alt=""> </b>
                        <span class="logo-compact"><img src="{{ url(Auth()->user()->name) }}" alt=""></span>
                        <span class="brand-title">
                            <h4 style="color: #fff;" class="text-uppercase"><b>Dashboard</b></h4>
                        </span>
                    </a>
                </div>
            </div>
        <!--**********************************
            Nav header end
            ***********************************-->

        <!--**********************************
            Header start
            ***********************************-->
            <div class="header">    
                <div class="header-content clearfix">

                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
                    
                    <div class="header-right">
                        <ul class="clearfix">


                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="https://i.ibb.co/8b8PG14/images.png" height="40" width="40" alt="">
                                </div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                
                                            <li><a href="{{ url("logout") }}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <!--**********************************
            Header end ti-comment-alt
            ***********************************-->


        <!--**********************************
            Sidebar start
            ***********************************-->
            <div class="nk-sidebar">           
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label" style="color:gray;">Dashboard</li>

                        <li>
                            <a href="{{ url("/dashboard") }}" aria-expanded="false">
                                <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                            </a>
                        </li>


                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-grid menu-icon"></i><span class="nav-text">Customer Income/Expense</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/addcustomer_incomeexpense')}}">Customer Income/Expense</a></li>
                                <li><a href="{{ url('/customer_incomeexpense')}}">Manage Income/Expense</a></li>
                                <li><a href="{{ url('/customerreports')}}">Customer Reports</a></li>
                            </ul>
                        </li>


                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-grid menu-icon"></i><span class="nav-text">Supplier Income/Expense</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/addsupplier_incomeexpense')}}">Supplier Income/Expense</a></li>
                                <li><a href="{{ url('/supplier_incomeexpense')}}">Manage Income/Expense</a></li>
                                <li><a href="{{ url('/supplierreports')}}">Supplier Reports</a></li>
                            </ul>
                        </li>





                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-grid menu-icon"></i><span class="nav-text">Customer Information</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/addcustomer')}}">Add Customer</a></li>
                                <li><a href="{{ url('/customer')}}">Manage Customer</a></li>
                            </ul>
                        </li>


                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-grid menu-icon"></i><span class="nav-text">Supplier Information</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/addsupplier')}}">Add Supplier</a></li>
                                <li><a href="{{ url('/supplier')}}">Manage Supplier</a></li>
                            </ul>
                        </li>







                    </ul>
                </div>
            </div>
        <!--**********************************
            Sidebar end
            ***********************************-->




            @yield('content')



        </div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
        Scripts
        ***********************************-->
        <script src="{{ asset("backend/admindashboard") }}/plugins/common/common.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/js/custom.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/js/settings.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/js/gleek.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/js/styleSwitcher.js"></script>

        <!-- Chartjs -->
        <script src="{{ asset("backend/admindashboard") }}/plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="{{ asset("backend/admindashboard") }}/plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="{{ asset("backend/admindashboard") }}/plugins/d3v3/index.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/plugins/topojson/topojson.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="{{ asset("backend/admindashboard") }}/plugins/raphael/raphael.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/plugins/morris/morris.min.js"></script>
        <!-- Pignose Calender -->
        <script src="{{ asset("backend/admindashboard") }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="{{ asset("backend/admindashboard") }}/plugins/chartist/js/chartist.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



        <script src="{{ asset("backend/admindashboard") }}/js/dashboard/dashboard-1.js"></script>

        <script src="{{ asset("backend/admindashboard") }}/plugins/summernote/dist/summernote.min.js"></script>
        <script src="{{ asset("backend/admindashboard") }}/plugins/summernote/dist/summernote-init.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
          @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
            case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
        }
        @endif
    </script>


    <script src="{{ asset("backend/admindashboard") }}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("backend/admindashboard") }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset("backend/admindashboard") }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <style type="text/css">
        .dataTables_filter input{
            border:1px solid lightgray!important;
            height: 30px!important;
        }
    </style>

    <script type="text/javascript">
      (function($) {
        "use strict"

        new quixSettings({
            sidebarPosition: "fixed",
            headerPosition: "fixed"
        });

    })(jQuery);



    
</script>

</body>

</html>