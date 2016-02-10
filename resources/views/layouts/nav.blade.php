<ul class="nav navbar-top-links navbar-right">
@if (Auth::guest())
    <li><a href="{{ url('/login') }}">প্রবেশ করুন</a></li>
    <li><a href="{{ url('/register') }}">নিবন্ধন করুন</a></li>
@else    
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ action('AuthController@useredit', ['id' => Auth::user()->id]) }}"><i class="fa fa-user fa-fw"></i> প্রফাইল </a>
            </li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> প্রস্থান</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
    @endif
</ul>
<!-- /.navbar-top-links -->