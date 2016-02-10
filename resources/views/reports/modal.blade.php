<div class="modal fade" id="monthlyModal" tabindex="-1" role="dialog" aria-labelledby="monthlyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="monthlyModal">বাড়ী ভাড়া মাস সিলেট করুন!</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['action'=>'MonthalyreportController@index']) !!}
                <div class="form-group">
                    {!! Form::selectMonth('month', null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::selectRange('year', 2016, 2020, null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('সাবমিট', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>