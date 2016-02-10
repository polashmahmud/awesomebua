@extends('layouts.app')

@section('page-header')
    <h1>
        বাৎসরিক <small>বাজারের হিসাব!</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
        <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
        <li><a href="{{ url('/account') }}"><i class="fa fa-shopping-cart"></i> বাজার</a></li>
        <li><a href="{{ url('/shop') }}"><i class="fa fa-calendar"></i> বাজারের তারিখ</a></li>
        <li><a href="{{ url('/accountsummary') }}"><i class="fa fa-cart-plus"></i> এই বছরের বাজার হিসাব</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
            @include('accountsummary.january')
            @include('accountsummary.february')
            @include('accountsummary.march')
            @include('accountsummary.april')
            @include('accountsummary.may')
            @include('accountsummary.june')
            @include('accountsummary.july')
            @include('accountsummary.august')
            @include('accountsummary.september')
            @include('accountsummary.october')
            @include('accountsummary.november')
            @include('accountsummary.december')
    </div>


@endsection