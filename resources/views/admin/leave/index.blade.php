@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#exampleModalCenter">
            Add Leave
        </button>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"
                            style="font-family: Poppins; font-size: 30px;font-weight: 600;line-height: 32px;letter-spacing: 0px;text-align: left;color: #05004E;  font-weight: bold;">
                            Add Leave</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('leave.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">From-To</label>
                                    <div class="input-group input-group-outline ">
                                        <input type="text" class="form-control" name="dates" id="dates"
                                            selected>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 my-3">
                                    <label class="form-label">No. of Leave</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" name="number_of_leave" id="number_of_leave"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Leave Type</label>
                                    <div class="input-group input-group-outline ">
                                        <select name="leave_type" id="leave_type" class="form-control" required>
                                            <option value="">Select leave type</option>
                                            <option value="0">Full Day</option>
                                            <option value="1">First Half Day</option>
                                            <option value="2">Second Half Day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 my-3">
                                    <label class="form-label">Leave reason</label>
                                    <div class="input-group input-group-outline ">
                                        <input type="text" name="leave_reason" id="leave_reason"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 my-1">
                                    <button type="button" class="btn btn-secondary" id="close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
{!! Toastr::message() !!}
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

        $('#add').click(function() {
            $('#id').val('');
            $('#postForm').trigger("reset");
            $('#exampleModalLongTitle').html(" Add Project");
            $('#exampleModalCenter').modal('show');
        });

        $('body').on('click', '.editLeave', function() {
            var leave_id = $(this).data('id');
            $.get("{{ url('leave') }}" + '/' + 'edit/' + leave_id, function(
                data) {
                $('#exampleModalCenter').modal('show');
                $('#exampleModalLongTitle').html("Edit Leave");
                $('#id').val(data.id);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
                $('#number_of_leave').val(data.number_of_leave);
                $('#leave_type').val(data.leave_type);
                $('#leave_reason').val(data.leave_reason);
            })
        });

        $('#close').click(function() {
            $('#exampleModalCenter').modal('hide');
        });

        $('body').on('click', '.deleteLeave', function() {
            var leave_id = $(this).data("id");
            alert("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ url('leave') }}" + '/' + leave_id,
                success: function(data) {
                    table.draw();
                    location.reload(true);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
        $(document).ready(function() {
            $('#dates').daterangepicker();
            $('#dates').on('apply.daterangepicker', function(ev, picker) {
                var startDate = picker.startDate;
                var endDate = picker.endDate;
                var numberOfLeave = endDate.diff(startDate, 'days') + 1;
                $('#number_of_leave').val(numberOfLeave);
            });
        });
    });
</script>
