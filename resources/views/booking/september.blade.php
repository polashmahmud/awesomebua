<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> মাসঃ সেপ্টেম্বর</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="label label-primary">বছরঃ {{ $year }}</span>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>নাম</th>
                    <th>রুম আইডি</th>
                    <th>সকাল</th>
                    <th>দুপুর</th>
                    <th>রাত</th>
                    <th>সর্বমোট</th>
                </tr>
                </thead>
                <tbody>
                {{-- */$breakfasttotal = $lunchtotal = $dinnertotal = 0;/* --}}
                @foreach($september as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->room_id }}</td>
                        <td>{{ eb2bn($data->t_breakfast) }}</td>
                        <td>{{ eb2bn($data->t_lunch) }}</td>
                        <td>{{ eb2bn($data->t_dinner) }}</td>
                        <td>{{ eb2bn($data->t_breakfast + $data->t_lunch + $data->t_dinner) }}</td>
                        {{-- */$breakfasttotal += $data->t_breakfast;/* --}}
                        {{-- */$lunchtotal += $data->t_lunch;/* --}}
                        {{-- */$dinnertotal += $data->t_dinner;/* --}}
                    </tr>
                @endforeach
                <tr>
                    <th>যোগফলঃ</th>
                    <th></th>
                    <th>{{ $breakfasttotal }}</th>
                    <th>{{ $lunchtotal }}</th>
                    <th>{{ $dinnertotal }}</th>
                    <th>{{ $breakfasttotal + $lunchtotal + $dinnertotal }}</th>
                </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>