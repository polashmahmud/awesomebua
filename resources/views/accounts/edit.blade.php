@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <h1>
        বাজার <small>সম্পাদন করুন!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-shopping-cart"></i> বাজার</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        {!! Form::model($account, [
                            'method'=>'PATCH',
                            'route'=>['account.update', $account->id],
                        ]) !!}
                        <div class="panel-body">
                            <div class="col-md-2">
                                {!! Form::text('accountdate', null, ['data-date-format' => 'yyyy/mm/dd', 'data-provide' => 'datepicker', 'class' => 'form-control date', 'placeholder' => 'তারিখ']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'টাকা']) !!}
                            </div>

                            <div class="col-md-2">
                                {!! Form::submit('সাবমিট', ['class' => 'btn btn-flat btn-info']) !!}
                                <a class="btn btn-flat btn-primary" href="/account">বাতিল</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">বাজারের আইটেম</h3>
                </div>
                <ul class="list-group">
                    @foreach($itemname as $data)
                        <li style="display:inline-block" ><span class="label label-default">{{ $data->item }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script>
        $('.date').datepicker({
            todayHighlight:'TRUE',
            autoclose: 'TRUE',
        });

        $('#description').select2({
            placeholder: "বাজারের আইটেম সিলেট করুন!",
        });
    </script>
@endsection

