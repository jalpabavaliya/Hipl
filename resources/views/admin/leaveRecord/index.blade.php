@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <div class="w3-panel w3-card card ">
            <div id="white">
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>No. of Leave</th>
                            <th>Leave Status</th>
                            <th>Leave Reason</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script>
  $('input[name="dates"]').daterangepicker();
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('leave.list') }}",
            dom: 'Blfrtip',
           
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print'
           ],
           language: {
               processing: '<span>Processing</span>',
           },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                }, {
                    data: 'number_of_leave',
                    name: 'number_of_leave'
                }, {
                    data: 'leave_type',
                    render: function(data, type, row, meta) {
                        if (data === 0) {
                            data =
                                '<span class="text-lg p-2 text-dark">Full Day</span>';
                        } else if (data === 1) {
                            data =
                                '<span class="text-lg p-2 rounded text-dark">First Half Day</span>';
                        } else if (data === 2) {
                            data =
                                '<span class="text-lg p-2 rounded text-dark">Second Half Day</span>';
                        }
                        return data;
                    }
                }, {
                    data: 'leave_reason',
                    name: 'leave_reason'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
