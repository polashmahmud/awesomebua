@extends('layouts.app')

@section('page-header')
    <h1>
        আজকের খাবারের হিসাব!
        <small>আজঃ {{ date('l jS \\of F Y h:i:s A', strtotime(Carbon\Carbon::now())) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $breakfast }}</h3>

                    <p>সকালের নাস্তা</p>
                </div>
                <div class="icon">
                    <i class="fa fa-coffee"></i>
                </div>
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $lunch }}</h3>

                    <p>দুপুরের খাবার</p>
                </div>
                <div class="icon">
                    <i class="fa fa-spoon"></i>
                </div>
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $dinner }}</h3>

                    <p>রাতের খাবার</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cutlery"></i>
                </div>
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $breakfast + $lunch + $dinner }}</h3>

                    <p>সর্বমোট</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
    </div>
    @foreach($tomorrowshop as $data)
        @if($data->user_id == Auth::user()->id)
            <div class="callout callout-info">
                <h4>রিমাইন্ডারঃ</h4>

                <p>কাল আপনার বাজার করবার কথা। আপনি বাজার করেছেন তো?</p>
            </div>
        @endif
    @endforeach
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">যারা বুকিং দিয়েছেনঃ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody><tr>
                            <th style="width: 15px"></th>
                            <th>সদস্য</th>
                            <th>রুম আইডি</th>
                            <th>সকালের নাস্তা</th>
                            <th>দুপুরের খাবার</th>
                            <th>রাতের খাবার</th>
                        </tr>
                        @foreach($bookings as $booking)
                            <tr>
                                @if($booking->user->picture == null)
                                    <td width="5px"><img src="/images/profile.jpg" alt="{{ $booking->user->name }}" height="20px" width="20px" class="img-rounded"></td>
                                @else
                                    <td width="5px"><img src="{{ '/images/'.$booking->user->picture }}" alt="{{ $booking->user->name }}" height="20px" width="20px" class="img-rounded"></td>
                                @endif
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->room_id }}</td>
                                <td>@if($booking->breakfast == "on") <span class="label label-success">খাবেন</span> @else <span class="label label-danger">খাবেন না</span> @endif</td>
                                <td>@if($booking->lunch == "on") <span class="label label-success">খাবেন</span> @else <span class="label label-danger">খাবেন না</span> @endif</td>
                                <td>@if($booking->dinner == "on") <span class="label label-success">খাবেন</span> @else <span class="label label-danger">খাবেন না</span> @endif</td>
                            </tr>
                        @endforeach
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        @if(Auth::user()->picture == null)
                            <img class="img-circle" src="/images/profile.jpg" alt="User Avatar">
                        @else
                            <img class="img-circle" src="{{ '/images/'.Auth::user()->picture }}" alt="User Avatar">
                        @endif
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                    <h5 class="widget-user-desc">@if(Auth::user()->admin == 1) Admin @else User @endif</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">@if($balance <= 0)আপনার একাউন্ট টাকা আছেঃ @else আপনার কাছ থেকে টাকা পাবেঃ @endif <span class="pull-right badge bg-blue">{{ $balance }}</span></a></li>
                        <li><a href="#">এই মাসে আপনি বাজার করেছেন <span class="pull-right badge bg-aqua">{{ $price }}</span></a></li>
                        <li><a href="#">এই মাসে সকালে নাস্তা বুকিং দিয়েছেন <span class="pull-right badge bg-green">{{ $currentmonthbreakfast }}</span></a></li>
                        <li><a href="#">এই মাসে দুপুরের খাবার বুকিং দিয়েছেন <span class="pull-right badge bg-yellow">{{ $currentmonthlunch }}</span></a></li>
                        <li><a href="#">এই মাসে রাতের খাবার বুকিং দিয়েছেন <span class="pull-right badge bg-olive">{{ $currentmonthdinner }}</span></a></li>
                        <li><a href="#">এই মাসে মোট খাবার বুকিং দিয়েছেন <span class="pull-right badge bg-red">{{ $totalbooking }}</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">বাজার করবার তারিখঃ</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            @foreach($todaydayshop as $name)
                            <div class="product-img">
                                @if($name->user->picture == null)
                                    <img src="/images/profile.jpg" alt="{{ $name->user->name }}">
                                @else
                                    <img src="{{ '/images/'.$name->user->picture }}" alt="{{ $name->user->name }}">
                                @endif
                            </div>
                            <div class="product-info">
                                <a href="javascript::;" class="product-title">আজ বাজার করবেনঃ
                        <span class="product-description">
                          {{ $name->user->name }} | মোবাইলঃ {{ $name->user->phone }}
                        </span>
                            </div>
                            @endforeach
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            @foreach($tomorrowshop as $name)
                            <div class="product-img">
                                @if($name->user->picture == null)
                                    <img src="/images/profile.jpg" alt="{{ $name->user->name }}">
                                @else
                                    <img src="{{ '/images/'.$name->user->picture }}" alt="{{ $name->user->name }}">
                                @endif
                            </div>
                            <div class="product-info">
                                <a href="javascript::;" class="product-title">পরের দিন বাজার করবেনঃ
                        <span class="product-description">
                          {{ $name->user->name }} | মোবাইলঃ {{ $name->user->phone }}
                        </span>
                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ url('/shop') }}" class="uppercase">এই মাসে কার কবে বাজার তা দেখুন</a>
                </div>
                <!-- /.box-footer -->
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">পরের দিন <span class="label label-info">{{ date('d-m-Y', strtotime($tomorrow)) }}</span> তারিখে খাবেনঃ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>বিবরণ</th>
                            <th style="width: 40px">সংখ্যা</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>সকালের নস্তা খাবেনঃ</td>
                            <td><span class="badge bg-aqua">{{ $t_breakfast }}</span></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>দুপুরের খাবার খাবেনঃ</td>
                            <td><span class="badge bg-yellow">{{ $t_lunch }}</span></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>রাতের খাবার খাবেনঃ</td>
                            <td><span class="badge bg-light-blue">{{ $t_dinner }}</span></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>সর্বমোট বুকিংঃ</td>
                            <td><span class="badge bg-red">{{ $t_breakfast + $t_lunch + $t_dinner }}</span></td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">পরের দিনের বুকিং দিয়েছেঃ</h3>

                    <div class="box-tools pull-right">
                        {{--<span class="label label-danger">8 New Members</span>--}}
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($tomorrowbookinguser as $data)
                        <li>
                            @if($data->user->picture == null)
                                <img src="/images/profile.jpg" alt="{{ $data->user->name }}">
                            @else
                                <img src="{{ '/images/'.$data->user->picture }}" alt="{{ $data->user->name }}">
                            @endif
                            <a class="users-list-name" href="#">{{ $data->user->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ url('/userlist') }}" class="uppercase">সকল সদস্যের লিস্ট দেখুন</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
@endsection
