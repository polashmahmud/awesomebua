<div class="panel-body">
    <div class="col-md-4">
        <input type="text" disabled value="{{ $booking->bookingdate }}" name="bookingdate" data-date-format="yyyy/mm/dd" class="form-control date" placeholder="খাবার নির্দেশনার তারিখ দিন!"/>
    </div>
    @if($booking->breakfast == 'on')
        <div class="col-md-2">
            <input type="checkbox" checked name="breakfast" data-toggle="toggle" data-on="নাস্তা খাবেন " data-off="নাস্তা খাবেন না" data-onstyle="primary" data-offstyle="danger">
        </div>
    @else
        <div class="col-md-2">
            <input type="checkbox" name="breakfast" data-toggle="toggle" data-on="নাস্তা খাবেন " data-off="নাস্তা খাবেন না" data-onstyle="primary" data-offstyle="danger">
        </div>
    @endif

    @if($booking->lunch == 'on')
        <div class="col-md-2">
            <input type="checkbox" checked name="lunch"  data-toggle="toggle" data-on="দুপুরে  খাবেন " data-off="দুপুরে খাবেন না " data-onstyle="success" data-offstyle="danger">
        </div>
    @else
        <div class="col-md-2">
            <input type="checkbox" name="lunch"  data-toggle="toggle" data-on="দুপুরে  খাবেন " data-off="দুপুরে খাবেন না " data-onstyle="success" data-offstyle="danger">
        </div>
    @endif

    @if($booking->dinner == 'on')
        <div class="col-md-2">
            <input type="checkbox" checked name="dinner"  data-toggle="toggle" data-on="রাতে খাবেন " data-off="রাতে খাবেন না " data-onstyle="info" data-offstyle="danger">
        </div>
    @else
        <div class="col-md-2">
            <input type="checkbox" name="dinner"  data-toggle="toggle" data-on="রাতে খাবেন " data-off="রাতে খাবেন না " data-onstyle="info" data-offstyle="danger">
        </div>
    @endif

    <div class="col-md-2">
        {!! Form::submit('সম্পাদন', ['class' => 'btn btn-info']) !!}
        <a class="btn btn-default" href="/booking">বাতিল</a>
    </div>
</div>