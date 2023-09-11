@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10" style="overflow-x:scroll;">
        <!-- <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Employee</button> -->
        <a href="{{ url('employee/create') }}" id="add1">Add Employee</a>
        <div class="w3-panel w3-card card ">
            <div id="white">
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee code</th>
                            <th>First name</th>
                            <th>Middle name</th>
                            <th>Last name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Department</th>
                            <th>Joining date</th>
                            <th>Address</th>
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
{!! Toastr::message() !!}
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employee.list') }}",
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            language: {
                processing: '<span>Processing</span>',
            },
            search: {
                caseInsensitive: false,
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'emp_code',
                    name: 'emp_code'
                }, {
                    data: 'first_name',
                    name: 'first_name'
                }, {
                    data: 'middle_name',
                    name: 'middle_name'
                }, {
                    data: 'last_name',
                    name: 'last_name'
                }, {
                    data: 'mobile',
                    name: 'mobile'
                }, {
                    data: 'email',
                    name: 'email'
                }, {
                    data: 'birth_date',
                    name: 'birth_date'
                }, {
                    data: 'dept',
                    name: 'dept'
                }, {
                    data: 'date_of_joining',
                    name: 'date_of_joining'
                }, {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $(document).on('click', '.delete', function() {
            var id = $(this).data("id");
            if (confirm("Are you sure you want to delete this employee?")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('employee/delete', ['id' => '']) }}/" + id,
                    success: function(data) {
                        table.draw();
                        location.reload(true);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    });
</script>
