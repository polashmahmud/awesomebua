@extends('layouts.app')

@section('page-header')
   <h1>
      বাৎসরিক <small>খাবার বুকিং হিসাব!</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> হোম</a></li>
      <li><a href="{{ url('/booking') }}"><i class="fa fa-coffee"></i> বুকিং</a></li>
      <li><a href="{{ url('/account') }}"><i class="fa fa-shopping-cart"></i> বাজার</a></li>
      <li><a href="{{ url('/shop') }}"><i class="fa fa-calendar"></i> বাজারের তারিখ</a></li>
      <li><a href="{{ url('/bookingsummary') }}"><i class="fa fa-coffee"></i> এই বছরের বুকিং হিসাব</a></li>
   </ol>
@endsection

@section('content')
 <div class="row">
    @include('booking.january')
    @include('booking.february')
    @include('booking.march')
    @include('booking.april')
    @include('booking.may')
    @include('booking.june')
    @include('booking.july')
    @include('booking.august')
    @include('booking.september')
    @include('booking.october')
    @include('booking.november')
    @include('booking.december')
 </div>


@endsection

