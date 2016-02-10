@extends('layouts.app')

@section('page-header')
    <h1>
        বুকিং <small>হিসাব!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
        <li><a href="{{ url('/account') }}"><i class="fa fa-shopping-cart"></i> বাজার</a></li>
        <li><a href="{{ url('/shop') }}"><i class="fa fa-calendar"></i> বাজারের তারিখ</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-book glyphicon"></i> বুকিং হিসাব</a></li>
    </ol>
@endsection

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">বুকিং রিপোর্টঃ {{ $monthName }}-{{ $year }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th></th>
                        <th>নাম</th>
                        <th>রুম আইডি</th>
                        <th>সকাল</th>
                        <th>দুপুর</th>
                        <th>রাত</th>
                        <th>মোট বুকিং</th>
                        <th>মোট বাজার</th>
                        <th>প্রতি মিল</th>
                        <th>মোট মিল টাকা</th>
                        <th>ব্যালেন্স</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- */$allusertotalprice = 0;/* --}}
                    {{-- */$totalbalance = 0;/* --}}
                    @foreach($datas as $data)
                        {{-- */$total = $data['t_b']+$data['t_l']+$data['t_d'];/* --}}
                        {{-- */$usertotalparice = $total*$perbookingprice;/* --}}
                        {{-- */$allusertotalprice += $usertotalparice;/* --}}
                        {{-- */$balance = $usertotalparice - $data['exp']/* --}}
                        {{-- */$totalbalance += $balance;/* --}}
                        <tr>
                            @if($data['picture'] == null)
                                <td width="5px"><img src="/images/profile.jpg" alt="{{ $data['name'] }}" height="20px" width="20px" class="img-rounded"></td>
                            @else
                                <td width="5px"><img src="{{ '/images/'.$data['picture'] }}" alt="{{ $data['name'] }}" height="20px" width="20px" class="img-rounded"></td>
                            @endif
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['room_id'] }}</td>
                            <td>{{ eb2bn($data['t_b']) }}</td>
                            <td>{{ eb2bn($data['t_l']) }}</td>
                            <td>{{ eb2bn($data['t_d']) }}</td>
                            <td>{{ eb2bn($total) }}</td>
                            <td>{{{ eb2bn(number_format((float) $data['exp'], 0)) }}}</td>
                            <td>{{{ eb2bn(number_format((float) $perbookingprice, 0)) }}}</td>
                            <td>{{{ eb2bn(number_format((float) $usertotalparice, 0)) }}}</td>
                            <td>@if($balance <= 0)<span class="label label-success">{{{ eb2bn(number_format((float) $balance, 0)) }}}</span>@else <span class="label label-danger">{{{ eb2bn(number_format((float) $balance, 0)) }}}</span>@endif</td>
                            @if(Auth::user()->admin == 1)
                                <td><a href="{{ action('SummaryController@balance',[$data['id'],$balance,$month,$year]) }}" class="btn btn-flat btn-primary btn-xs">Add</a></td>
                            @endif
                        </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <th>সর্বমোটঃ</th>
                        <th></th>
                        <th>{{ $total_t_b }}</th>
                        <th>{{ $total_t_l }}</th>
                        <th>{{ $total_t_d }}</th>
                        <th>{{ $g_total }}</th>
                        <th>{{{ number_format((float) $total_exp, 0) }}}</th>
                        <th></th>
                        <th>{{{ number_format((float) $allusertotalprice, 0) }}}</th>
                        <th>{{{ number_format((float) $totalbalance, 0) }}}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
</div>
</div>
@endsection
