@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <h1>
        কে কবে <small>বাজার করবেন?</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
        <li><a href="{{ url('/account') }}"><i class="fa fa-shopping-cart"></i> বাজার</a></li>
        <li><a href="{{ url('/shop') }}"><i class="fa fa-shopping-cart"></i> বাজারের তারিখ</a></li>
    </ol>
@endsection


@section('content')
    @if(Auth::user()->admin == 1)
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">কে কবে বাজার করবে তা ইনপুট দিন!</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        {!! Form::open(['action' => 'ShopController@store']) !!}
                        <div class="panel-body">
                            <div class="col-md-4">
                                {!! Form::select('user_id', $user , null, ['class'=> 'form-control', 'id' => 'userid']) !!}
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="shopdate" data-date-format="yyyy/mm/dd" class="form-control date" placeholder="বাজারের তারিখ"/>
                            </div>
                            <div class="col-md-2">
                                {!! Form::submit('সাবমিট', ['class' => 'btn btn-info']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    @endif

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="box-title">বাজারের তারিখ সম্পাদন</h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <div id='calendar'></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
@endsection

@section('footer')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script>
        $('#datepicker2').datepicker({
            multidate: true
        });
        $('.date').datepicker({
            multidate: true,
            todayHighlight:'TRUE',
        });

        $("#userid").select2({
            placeholder: "সদস্য সিলেট করুন।",
            allowClear: true
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