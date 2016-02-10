@extends('layouts.app')

@section('page-header')
    <h1>
        এডমিন <small>প্যানেল!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>হোম</span></a></li>
        <li><a href="{{ url('/admin') }}"><i class="fa fa-user-secret"></i> এডমিন</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">এডমিন প্যানেল!</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">{{ date('l jS \\of F Y h:i:s A', strtotime(Carbon\Carbon::now())) }}</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>নাম</th>
                            <th>লগিন নেম</th>
                            <th>ইমেল</th>
                            <th>মোবাইল</th>
                            <th>রুম নম্বর</th>
                            <th>একটিভ</th>
                            <th>এডমিন</th>
                            <th>পাসওয়ার্ড</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if($user->picture == null)
                                    <td><img src="/images/profile.jpg" alt="{{ $user->name }}" height="25px" width="25px" class="img-rounded"></td>
                                @else
                                    <td><img src="{{ '/images/'.$user->picture }}" alt="{{ $user->name }}" height="25px" width="25px" class="img-rounded"></td>
                                @endif
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->nickname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->room_id }}</td>
                                <td><a class="btn btn-flat btn-success btn-xs" href="/admin/{{ $user->id }}">@if($user->active == 1) Active @else Deactive @endif</a></td>
                                <td><a class="btn btn-flat btn-info btn-xs" href="/admin/admin/{{ $user->id }}">@if($user->admin == 1) Admin @else User @endif</a></td>
                                <td><a class="btn btn-flat btn-danger btn-xs" href="/admin/password/{{ $user->id }}">Password Changed</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! $users->render() !!}
                </div><!-- box-footer -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection
