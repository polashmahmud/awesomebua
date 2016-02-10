@if(Auth::check())
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            {{--<li class="sidebar-search">--}}
                {{--<div class="input-group custom-search-form">--}}
                    {{--<input type="text" class="form-control" placeholder="Search...">--}}
                    {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" type="button">--}}
                            {{--<i class="fa fa-search"></i>--}}
                        {{--</button>--}}
                    {{--</span>--}}
                {{--</div>--}}
                {{--<!-- /input-group -->--}}
            {{--</li>--}}
            <li>
                <a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> হোম</a>
            </li>
            <li>
                <a href="{{ url('/booking') }}"><i class="glyphicon glyphicon-plus"></i> বুকিং</a>
            </li>
            <li>
                <a href="{{ url('/account') }}"><i class="glyphicon glyphicon-shopping-cart"></i> বাজার</a>
            </li>
            <li>
                <a href="{{ url('/shop') }}"><i class="glyphicon glyphicon-calendar"></i> বাজারের তারিখ</a>
            </li>
            <li>
                <a data-toggle="modal" data-target="#myModal" href="#"><i class="glyphicon glyphicon-book glyphicon "></i> বুকিং হিসাব</a>
            </li>
            <li>
                <a data-toggle="modal" data-target="#monthlyModal" href="#"><i class="glyphicon glyphicon-book glyphicon "></i> মাসিক হিসাব</a>
            </li>
            <li>
                <a href="{{ url('/useraccounts') }}"><i class="glyphicon glyphicon-plus"></i> একাউন্ট</a>
            </li>
            <li>
                <a href="{{ url('/userlist') }}"><i class="glyphicon glyphicon-user"></i> সদস্য সমূহ</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> রিপোর্ট<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/bookingsummary') }}"><i class="glyphicon glyphicon-plus-sign"></i> বুকিং হিসাব</a>
                    </li>
                    <li>
                        <a href="{{ url('/accountsummary') }}"><i class="glyphicon glyphicon-calendar"></i> বাজারের হিসাব</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @if(Auth::user()->admin == 1)
            <li>
            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Admin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/admin') }}">এডমিন</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
@endif