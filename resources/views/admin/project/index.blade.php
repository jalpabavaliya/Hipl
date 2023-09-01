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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-family: Poppins; font-size: 30px;font-weight: 600;line-height: 32px;letter-spacing: 0px;text-align: left;color: #05004E;  font-weight: bold;">Add Project</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('project.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Project Name</label>
                                <input type="text" name="project_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- <label class="form-label">Project Status</label> --}}
                            <div class="input-group input-group-outline my-3">
                                <select class="form-control" name="status" id="exampleFormControlSelect1" required>
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
                                <input type="date" name="start_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">End Date</label>
                            <div class="input-group input-group-outline">
                                <input type="date" name="end_date"  value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-4">
                                <label class="form-label">Productivity</label>
                                <input type="text" name="productivity" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<script>
    $(function() {
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
                { data: "project_status",
                render: function(data, type, row, meta){
                    //   if(type === 'display'){
                        if(data === 0){
                            data = '<span class="bg-primary text-sm p-2 rounded text-light">In Progress</span>';
                        }
                        else if(data === 1){
                            data = '<span class="bg-success text-sm p-2 rounded text-light">Complete</span>';
                        }
                        return data;
                    }},
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
    });
</script>
  