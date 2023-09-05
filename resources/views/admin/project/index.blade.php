@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#exampleModalCenter">
            Add Project
        </button>
        <div class="w3-panel w3-card card ">
            <div id="white">
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Project Name</th>
                            <th>Project Status</th>
                            <th>Productivity</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
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
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form id="postForm" name="postForm" method="post" action="{{ route('project.store') }}">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Project Name</label>
                                    <div class="input-group input-group-outline ">
                                        <input type="text" name="project_name" id="project_name" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Project Status</label>
                                    <div class="input-group input-group-outline">
                                        <select class="form-control" name="status" id="exampleFormControlSelect1"
                                            required>
                                            <option value="0">In Progress</option>
                                            <option value="1">Complete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Starting Date</label>
                                    <div class="input-group input-group-outline">
                                        <input type="date" name="start_date" id="start_date"
                                            value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Date</label>
                                    <div class="input-group input-group-outline">
                                        <input type="date" name="end_date" id="end_date"
                                            value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Productivity</label>
                                    <div class="input-group input-group-outline mb-4">
                                        <input type="text" name="productivity" id="productivity" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-secondary me-2" id="close"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="savedata">Save changes</button>
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
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('project.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: "project_status",
                    render: function(data, type, row, meta) {
                        //   if(type === 'display'){
                        if (data === 0) {
                            data =
                                '<span class="bg-primary text-sm p-2 rounded text-light">In Progress</span>';
                        } else if (data === 1) {
                            data =
                                '<span class="bg-success text-sm p-2 rounded text-light">Complete</span>';
                        }
                        return data;
                    }
                },
                {
                    data: 'productivity',
                    name: 'productivity'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                },
                {
                    data: 'action',
                    name: 'action',
                    // orderable: false,
                    // searchable: false
                },
            ]
        });
        $('#add').click(function() {
            $('#id').val('');
            $('#postForm').trigger("reset");
            $('#exampleModalLongTitle').html(" Add Project");
            $('#exampleModalCenter').modal('show');
        });
        $('#close').click(function() {
            $('#exampleModalCenter').modal('hide');
        });
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get("{{ url('project/edit', ['id' => '']) }}/" + id, function(data) {
                $('#exampleModalLongTitle').html("Edit Project");
                $('#savedata').val("edit-project");
                $('#exampleModalCenter').modal('show');
                $('#id').val(data.id);
                $('#project_name').val(data.project_name);
                $('#exampleFormControlSelect1').val(data.project_status);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
                $('#productivity').val(data.productivity);
            })
        });
        $(document).on('click', '.delete', function() {
            var id = $(this).data("id");
            if (confirm("Are you sure you want to delete this project?")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('project/delete', ['id' => '']) }}/" + id,
                    success: function(data) {
                        // Refresh the DataTable
                        table.ajax.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
</script>
