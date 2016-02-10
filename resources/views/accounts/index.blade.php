@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <h1>
        বাজার <small>কি করেছেন তা লিখুন!</small>
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
                        {!! Form::open(['route'=>'account.store']) !!}
                        <div class="panel-body">
                            <div class="col-md-2">
                                <input type="text" name="accountdate" data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control date" placeholder="তারিখ"/>
                            </div>
                            <div class="col-md-6">
                                {!! Form::select('description[]*', $items, null, ['id' => 'description', 'class' => 'form-control', 'multiple']) !!}
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="amount" class="form-control" placeholder="টাকা"/>
                            </div>

                            <div class="col-md-2">
                                {!! Form::submit('সাবমিট', ['class' => 'btn btn-flat btn-info']) !!}
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
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">বাজারের হিসাব</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <tbody><tr>
                            <th>তারিখ</th>
                            <th>বর্ণনা</th>
                            <th>টাকার পরিমান</th>
                            <th>সম্পাদন</th>
                            <th>ডিলিট</th>
                        </tr>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{ eb2bn($account->accountdate) }}</td>
                                <td>{{ $account->description }}</td>
                                <td>{{ eb2bn($account->amount) }}</td>
                                <td>
                                    @if($account->created_at->diffInHours(Carbon\Carbon::now()) < 3)
                                        <a href="{{ route('account.edit', $account->id) }}" class="btn btn-flat btn-primary btn-xs">সম্পাদন</a></td>
                                @else
                                    <button type="button" class="btn btn-flat btn-primary btn-xs" disabled="disabled">সম্পাদন</button>
                                @endif
                                <td>
                                    @if($account->created_at->diffInHours(Carbon\Carbon::now()) < 3)
                                        <form action="{{ url('account/'.$account->id) }}" method="POST">
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
                    {!! $accounts->render() !!}
                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        {!! Form::open(['action' => 'AccountController@itemstore']) !!}
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control" name="item" placeholder="বাজারের নতুন আইটেমের নাম">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-flat btn-primary">নতুন আইটেম</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

            {{--<h5>এই মাসের হিসাব</h5>--}}
            {{--<ul class="list-group">--}}
                {{--<li class="list-group-item list-group-item-success">--}}
                    {{--<span class="badge"></span>--}}
                    {{--এই মাসে আপনি বাজার করেছেনঃ {{ eb2bn($price) }} টাকা।--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<hr />--}}
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

