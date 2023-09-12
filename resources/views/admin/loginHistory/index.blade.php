@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <h3 class="m-3">Login History</h3>
        <div class="w3-panel w3-card card ">
            <h4 class="mt-3">History</h4>
            <div>
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Login Status</th>
                            <th>Login Date/Time</th>
                            <th>Logout Date/Time</th>
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
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('login_history.list') }}",
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
                    data: 'user.first_name',
                    name: 'user.first_name'
                },
                {
                    data: "login_status",
                    render: function(data, type, row, meta) {
                        if (data === 0) {
                            data =
                                '<span class="bg-success text-sm p-2 rounded text-light">Logged In</span>';
                        } else if (data === 1) {
                            data =
                                '<span class="bg-info text-sm p-2 rounded text-light">Logged Out</span>';
                        } else if (data === 2) {
                            data =
                                '<span class="bg-danger text-sm p-2 rounded text-light">Failed</span>';
                        }
                        return data;
                    }
                },
                {
                    data: 'login_time',
                    name: 'login_time'
                },
                {
                    data: 'logout_time',
                    name: 'logout_time'
                },
            ]
        });
    });
</script>
