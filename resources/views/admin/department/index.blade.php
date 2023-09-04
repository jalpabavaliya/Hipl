@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#exampleModalCenter">
            Add Department
        </button>
        <div class="w3-panel w3-card card ">
            <div id="white">
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" class="editDepartment" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"
                            style="font-family: Poppins; font-size: 30px;font-weight: 600;line-height: 32px;letter-spacing: 0px;text-align: left;color: #05004E;  font-weight: bold;">
                            Department</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="department" action="{{ route('department.store') }}">
                            @csrf
                            <input type="hidden" name="department_id"
                                id="department_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="text" id="name" value="" 
                                            class="form-control" name="name" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
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
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('department.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('body').on('click', '.editDepartment', function() {
            var department_id = $(this).data('id');
            $.get("{{ url('department') }}" + '/' + 'edit/' + department_id, function(
                data) {
                $('#exampleModalCenter').modal('show');
                $('#department_id').val(data.id);
                $('#name').val(data.name);
            })
        });
        $('body').on('click', '.deleteDepartment', function() {
            var department_id = $(this).data("id");
            alert("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ url('department') }}" + '/' + department_id,
                success: function(data) {
                    table.draw();
                    location.reload(true);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
