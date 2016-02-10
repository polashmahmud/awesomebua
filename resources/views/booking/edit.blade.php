@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <h1>
        খাবার <small>বুকিং সম্পাদন করুন!</small>
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
                        {!! Form::model($booking, [
                            'method'=>'PATCH',
                            'route'=>['booking.update', $booking->id],
                        ]) !!}
                        @include('booking.formedit')

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
@endsection

