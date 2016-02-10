@extends('layouts.app')

@section('page-header')
    <h1>
        ইউজার <small>প্রফাইল!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ action('AuthController@useredit', ['id' => Auth::user()->id]) }}"><i class="fa fa-user"></i> প্রফাইল</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if($user->picture == null)
                            <img src="/images/profile.jpg" alt="{{ $user->name }}" class="profile-user-img img-responsive img-circle">
                        @else
                            <img src="{{ '/images/'.$user->picture }}" alt="{{ $user->name }}" class="profile-user-img img-responsive img-circle">
                        @endif

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">ইউজার আইডিঃ {{ $user->id }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>ইমেলঃ</b> <a class="pull-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>মোবাইলঃ</b> <a class="pull-right">{{ $user->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>রুম নম্বরঃ</b> <a class="pull-right">{{ $user->room_id }}</a>
                            </li>
                        </ul>

                        {{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-9">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">পাসওয়ার্ড পরিবর্তন করুন!</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">প্রফাইল ইনফরমেশন পরিবর্তন করুন!</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            {!! Form::open(['action' => 'AuthController@password']) !!}
                            <div class="form-group">
                                {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'নতুন পাসওয়ার্ড দিন']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'নতুন পাসওয়ার্ডটি আবারো  দিন']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('পাসওয়ার্ড পরির্বতন করুন', ['class' => 'btn btn-flat btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            {!! Form::model($user, [
                                'method'=>'PATCH',
                                'action'=>['AuthController@profile', $user->id],
                                'enctype' => 'multipart/form-data',
                            ]) !!}

                            <div class="form-group">
                                {!! Form::file('picture') !!}
                            </div>

                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::select('room_id', array('A-1' => 'A-1', 'A-2' => 'A-2', 'A-3' => 'A-3', 'B-1' => 'B-1', 'B-2' => 'B-2', 'B-3' => 'B-3'), null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('প্রফাইল সম্পাদন করুন', ['class' => 'btn btn-flat btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
    </div>



@endsection
