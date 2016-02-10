@extends('layouts.app')

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
                    <h3 class="box-title">ইউজার একাউন্ট</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>নাম</th>
                            <th>রুম আইডি</th>
                            <th>বুকিং মাস</th>
                            <th>বুকিং বিল</th>
                            <th>বাড়ি ভাড়া মাস</th>
                            <th>বাড়ি ভাড়া</th>
                            <th>ইন্টারনেট বিল</th>
                            <th>ইউটিলিটি বিল</th>
                            <th>বুয়ার বেতন</th>
                            <th>সর্বমোট</th>
                            <th>পেমেন্ট</th>
                            <th>ব্যালেন্স</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- */$foodamount_t = $houserent_t = $internetbill_t = $utlitybill_t = $buabill_t = $total_t = $payment_t =0 /*--}}
                        @foreach($accounts as $account)
                            {{-- */$total = $account->foodamount + $account->houserent + $account->internetbill + $account->utlitybill + $account->buabill;/* --}}

                            {{-- */$foodamount_t +=$account->foodamount /*--}}
                            {{-- */$houserent_t +=$account->houserent /*--}}
                            {{-- */$internetbill_t +=$account->internetbill /*--}}
                            {{-- */$utlitybill_t +=$account->utlitybill /*--}}
                            {{-- */$buabill_t +=$account->buabill /*--}}
                            {{-- */$total_t +=$total /*--}}
                            {{-- */$payment_t +=$account->pay /*--}}
                            <tr>
                                @if($account->user->picture == null)
                                    <td width="5px"><img src="/images/profile.jpg" alt="{{ $account->user->name }}" height="20px" width="20px" class="img-rounded"></td>
                                @else
                                    <td width="5px"><img src="{{ '/images/'.$account->user->picture }}" alt="{{ $account->user->name }}" height="20px" width="20px" class="img-rounded"></td>
                                @endif
                                <td>{{ $account->user->name }}</td>
                                <td>{{ $account->user->room_id }}</td>
                                <td>{{ date('F', strtotime($account->fooddate)) }}</td>
                                <td>{{ number_format((float) $account->foodamount, 0) }}</td>
                                <td>{{ date('F', strtotime($account->houserentdate)) }}</td>
                                <td>{{ number_format((float) $account->houserent, 0) }}</td>
                                <td>{{ number_format((float) $account->internetbill, 0) }}</td>
                                <td>{{ number_format((float) $account->utlitybill, 0) }}</td>
                                <td>{{ number_format((float) $account->buabill, 0) }}</td>
                                <td>{{ number_format((float) $total, 0)  }}</td>
                                <td>{{ number_format((float) $account->pay, 0) }}</td>
                                <td>@if($total - $account->pay <=1 )0 @else {{ number_format((float) $total - $account->pay, 0)  }}@endif</td>
                                @if(Auth::user()->admin == 1)
                                    <td><a href="{{ action('UseraccountsController@edit', $account->id) }}" class="btn btn-flat btn-primary btn-xs">Add</a></td></td>
                                @endif
                            </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th>যোগফলঃ</th>
                            <th></th>
                            <th></th>
                            <th>{{ number_format((float) $foodamount_t, 0) }}</th>
                            <th></th>
                            <th>{{ number_format((float) $houserent_t, 0) }}</th>
                            <th>{{ number_format((float) $internetbill_t, 0) }}</th>
                            <th>{{ number_format((float) $utlitybill_t, 0) }}</th>
                            <th>{{ number_format((float) $buabill_t, 0) }}</th>
                            <th>{{ number_format((float) $total_t, 0) }}</th>
                            <th>{{ number_format((float) $payment_t, 0) }}</th>
                            <th>{{ number_format((float) $total_t - $payment_t, 0) }}</th>
                            <th></th>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! $accounts->render() !!}
                </div><!-- box-footer -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection