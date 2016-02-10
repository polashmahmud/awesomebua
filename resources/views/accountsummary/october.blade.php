<div class="col-md-4">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> মাসঃ অক্ট্রোবর</h3>
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
                    <th>টাকা</th>
                </tr>
                </thead>
                <tbody>
                {{-- */$alltotal = 0;/* --}}
                @foreach($october as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ eb2bn($data->total) }}</td>
                        {{-- */$alltotal += $data->total;/* --}}
                    </tr>
                @endforeach
                <tr>
                    <th>যোগফলঃ</th>
                    <th>{{ $alltotal }}.00</th>
                </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>