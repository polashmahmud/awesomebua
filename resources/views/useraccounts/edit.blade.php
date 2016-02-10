@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <h1>
        ইউজার <small>একাউন্ট!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>হোম</span></a></li>
        <li><a href="{{ url('/admin') }}"><i class="fa fa-user-secret"></i> এডমিন</a></li>
        <li><a href="{{ url('/useraccounts') }}"><i class="fa fa-database"></i> <span>ইউজার একাউন্ট</span></a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">ইউজার একাউন্ট ইডিট</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model($account, [
                    'method'=>'PATCH',
                    'action'=>['UseraccountsController@update', $account->id],
                    'class'=>'form-horizontal',
                    ]) !!}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">খাবারের তারিখঃ</label>
                        <div class="col-sm-10">
                            {!! Form::text('fooddate', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">খাবারের বিলঃ</label>
                        <div class="col-sm-10">
                            {!! Form::text('foodamount', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">বাড়ী ভাড়া তারিখঃঃ</label>
                        <div class="col-sm-10">
                            {!! Form::text('houserentdate', null, ['data-date-format' => 'yyyy/mm/dd', 'data-provide' => 'datepicker', 'class' => 'form-control date']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">বাড়ী ভাড়াঃ</label>
                        <div class="col-sm-10">
                            {!! Form::number('houserent', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ইন্টারনেট বিলঃ</label>
                        <div class="col-sm-10">
                            {!! Form::number('internetbill', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ইউটিলিটি বিলঃ</label>
                        <div class="col-sm-10">
                            {!! Form::number('utlitybill', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">বুয়ার বেতনঃ</label>
                        <div class="col-sm-10">
                            {!! Form::number('buabill', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">পেমেন্টঃ</label>
                        <div class="col-sm-10">
                            {!! Form::text('pay', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('সাবমিট', ['class' => 'btn btn-flat btn-info']) !!}
                            <a class="btn btn-flat btn-primary" href="/useraccounts">বাতিল</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection

@section('footer')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#datepicker2').datepicker({
            multidate: false
        });
        $('.date').datepicker({
            multidate: false,
            todayHighlight:'TRUE',
            autoclose: 'TRUE',
        });
    </script>
@endsection