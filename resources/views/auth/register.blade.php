@include('layouts.header')
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 25px">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">অসাম বুয়া!</a>
        </div>
        <!-- /.navbar-header -->

        @include('layouts.nav')
    </nav>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">নিবন্ধন ফরম</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="active" value="1">

                        <div class="form-group">
                            <label class="col-md-4 control-label">আপনার পুরো নাম</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">ডাক নাম</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nickname" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">ইমেল এড্রেস</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">মোবাইল</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">ছবি</label>
                            <div class="col-md-6">
                                <input type="file" id="exampleInputFile" name="picture">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">রুম নম্বর</label>
                            <div class="col-md-6">
                                <select class="form-control" name="room_id">
                                    <option>A-1</option>
                                    <option>A-2</option>
                                    <option>A-3</option>
                                    <option>B-1</option>
                                    <option>B-2</option>
                                    <option>B-3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">পাসওয়ার্ড</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">পাসওয়ার্ড নিশ্চিতকরন</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>নিবন্ধন করুন!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')


