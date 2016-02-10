@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <h1>
        খাবার <small>বুকিং দিন!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        {!! Form::open(['route'=>'booking.store']) !!}
                        @include('booking.form', ['submitButtonText' => 'নির্দেশনা'])
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <div id='calendar'></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>

        <div class="col-md-3">
            {{--<h5>এই মাসের হিসাব</h5>--}}
            {{--<hr />--}}
            {{--<ul class="list-group">--}}
                {{--<li class="list-group-item list-group-item-success">--}}
                    {{--<span class="badge">{{ $currentmonthbreakfast }}</span>--}}
                    {{--সকালের নাস্তাঃ--}}
                {{--</li>--}}
                {{--<li class="list-group-item list-group-item-info">--}}
                    {{--<span class="badge">{{ $currentmonthlunch }}</span>--}}
                    {{--দুপুরের খাবারঃ--}}
                {{--</li>--}}
                {{--<li class="list-group-item list-group-item-warning">--}}
                    {{--<span class="badge">{{ $currentmonthdinner }}</span>--}}
                    {{--রাতের খাবারঃ--}}
                {{--</li>--}}
                {{--<li class="list-group-item list-group-item-danger">--}}
                    {{--<span class="badge">{{ $totalbooking }}</span>--}}
                    {{--সর্বমোট বুকিংঃ--}}
                {{--</li>--}}
            {{--</ul>--}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">বুকিং সম্পাদন</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <tbody><tr>
                            <th>তারিখ</th>
                            <th>সম্পাদন</th>
                            <th>ডিলিট</th>
                        </tr>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ eb2bn(date('d-m-Y', strtotime($booking->bookingdate))) }}</td>
                                <td>
                                    @if($booking->bookingdate > (Carbon\Carbon::now()))
                                        <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-flat btn-primary btn-xs">সম্পাদন</a></td>
                                @else
                                    <button type="button" class="btn btn-flat btn-primary btn-xs" disabled="disabled">সম্পাদন</button>
                                @endif
                                <td>
                                    @if($booking->bookingdate > (Carbon\Carbon::now()))
                                        <form action="{{ url('booking/'.$booking->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button class="btn btn-flat btn-danger btn-xs">বাতিল</button>
                                        </form>
                                    @else
                                        <button type="button" class="btn btn-flat btn-danger btn-xs" disabled="disabled">বাতিল</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody></table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $bookings->render() !!}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('footer')
    <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script>
        $('#datepicker2').datepicker({
            multidate: true
        });
        $('.date').datepicker({
            multidate: true,
            startDate: '+1d',
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },

            events: {!! json_encode($events) !!}
        });
    </script>

@endsection

