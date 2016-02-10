<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>অসাম মেস!</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header')

</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>অসা</b>ম</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>অসাম</b> মেস</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->picture == null)
                                <img src="/images/profile.jpg" width="160px" height="160px" class="user-image" alt="User Image">
                            @else
                                <img src="{{ '/images/'.Auth::user()->picture }}" width="160px" height="160px" class="user-image" alt="User Image">
                            @endif
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if(Auth::user()->picture == null)
                                    <img src="/images/profile.jpg" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{ '/images/'.Auth::user()->picture }}" class="img-circle" alt="User Image">
                                @endif
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Join: {{ Auth::user()->created_at}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            {{--<li class="user-body">--}}
                                {{--<div class="col-xs-4 text-center">--}}
                                    {{--<a href="#">Followers</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-4 text-center">--}}
                                    {{--<a href="#">Sales</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-4 text-center">--}}
                                    {{--<a href="#">Friends</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ action('AuthController@useredit', ['id' => Auth::user()->id]) }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->picture == null)
                        <img src="/images/profile.jpg" class="img-circle" alt="User Image">
                    @else
                        <img src="{{ '/images/'.Auth::user()->picture }}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> অনলাইন</a>
                </div>
            </div>
            @if(Auth::check())
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>হোম</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> <span>বুকিং</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('/account') }}"><i class="fa fa-shopping-cart"></i> <span>বাজার</span></a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>রিপোর্ট</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="glyphicon glyphicon-book glyphicon "></i> <span>বুকিং হিসাব</span></a></li>
                        <li><a data-toggle="modal" data-target="#monthlyModal" href="#"><i class="fa fa-calculator "></i> <span>মাসিক হিসাব</span></a></li>
                        <li><a href="{{ url('/shop') }}"><i class="fa fa-calendar"></i> <span>বাজারের তারিখ</span></a></li>
                        <li><a href="{{ url('/bookingsummary') }}"><i class="fa fa-coffee"></i> এই বছরের বুকিং হিসাব</a></li>
                        <li><a href="{{ url('/accountsummary') }}"><i class="fa fa-cart-plus"></i> এই বছরের বাজার হিসাব</a></li>
                        <li><a href="{{ url('/userlist') }}"><i class="fa fa-users"></i> সদস্য সমূহ</a></li>
                    </ul>
                </li>
                @if(Auth::user()->admin == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-secret"></i>
                        <span>এডমিন প্যানেল</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-user-secret"></i> এডমিন</a></li>
                        <li><a href="{{ url('/useraccounts') }}"><i class="fa fa-database"></i> <span>ইউজার একাউন্ট</span></a></li>
                    </ul>
                </li>
                @endif
                {{--<li>--}}
                    {{--<a href="../mailbox/mailbox.html">--}}
                        {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
                        {{--<small class="label pull-right bg-yellow">12</small>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
            @endif
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('page-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @include('layouts.flash')
            @include('errors.list')
            @include('summary.modal')
            @include('reports.modal')
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>


</div><!-- ./wrapper -->

<!-- JavaScripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/app.min.js') }}"></script>
<script>
    $("th, small, kbd, code, span").each(function(){
        $(this).text(en2bn($(this).text()));
    });
    function en2bn(input){
        var en = ["1","2","3","4","5","6","7","8","9","0",'January','th of ','Saturday','PM','AM','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','nd of','February','March','April','May','June','July','August','September','October','November','December','rd of'];
        var bn = ["১","২","৩","৪","৫","৬","৭","৮","৯","০",'জানুয়ারি', ', ','শনিবার',' ',' ','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রুবার',' ','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টবর','নভেম্বর','ডিসেম্বর',' '];
        input = input.toString();
        // use array length
        for( var i = 0; i < en.length ; i++)
        {
//                input = input.replace( en[i] , bn[i] );
            var re = new RegExp(en[i] ,'g');
            input = input.replace(re,  bn[i]);
        }
        return input;
    }

    $( document ).ready(function() {
        /*var html = $('#trns').html();
         html = en2bn(html);
         $('#trns').html(html);*/
    });
</script>
<script>
    $('#flash').delay(3000).slideUp(300);
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    });

    $('#monthlyModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>

@yield('footer')

</body>
</html>




