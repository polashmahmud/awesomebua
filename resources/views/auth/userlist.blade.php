@extends('layouts.app')

@section('page-header')
    <h1>
        সদস্য <small>সমূহ!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
        <li><a href="{{ url('/userlist') }}"><i class="fa fa-users"></i> সদস্য সমূহ</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">সদস্য সমূহ</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">{{ $totaluser }}</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ছবি</th>
                            <th>নাম</th>
                            <th>ইমেল</th>
                            <th>মোবাইল</th>
                            <th>রুম নম্বর</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userlist as $user)
                            <tr>
                                @if($user->picture == null)
                                    <td><img src="/images/profile.jpg" alt="{{ $user->name }}" height="50px" width="50px" class="img-rounded"></td>
                                @else
                                    <td><img src="{{ '/images/'.$user->picture }}" alt="{{ $user->name }}" height="50px" width="50px" class="img-rounded"></td>
                                @endif
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->room_id }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>



@endsection
