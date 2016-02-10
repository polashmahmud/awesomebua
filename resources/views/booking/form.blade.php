<div class="panel-body">
    <div class="col-md-4">
        <input type="text" name="bookingdate" data-date-format="yyyy/mm/dd" class="form-control date" placeholder="খাবার নির্দেশনার তারিখ দিন!"/>
    </div>
    <div class="col-md-2">
        <input type="checkbox" name="breakfast" data-toggle="toggle" data-on="নাস্তা খাবেন " data-off="নাস্তা খাবেন না" data-onstyle="primary" data-offstyle="danger">
    </div>
    <div class="col-md-2">
        <input type="checkbox" name="lunch"  data-toggle="toggle" data-on="দুপুরে  খাবেন " data-off="দুপুরে খাবেন না " data-onstyle="success" data-offstyle="danger">
    </div>
    <div class="col-md-2">
        <input type="checkbox" name="dinner"  data-toggle="toggle" data-on="রাতে খাবেন " data-off="রাতে খাবেন না " data-onstyle="info" data-offstyle="danger">
    </div>
    <div class="col-md-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-info']) !!}
    </div>
</div>