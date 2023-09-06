@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#exampleModalCenter">
            Add Salary
        </button>
        <div class="w3-panel w3-card card ">
            <div id="white">
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee Name</th>
                            <th>Amount</th>
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
                            Add Salary</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="salarys" action="{{ route('salary.store') }}">
                            @csrf
                            <input type="hidden" name="salary_id" id="salary_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Please Select Employee</label>
                                    <div class="input-group input-group-outline">
                                        <select class="form-control" name="user_id" id="user_id" value="" id="exampleFormControlSelect1"
                                            required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label mt-2">Salary</label>
                                    <div class="input-group input-group-outline mb-4">
                                        <input type="text" id="salary" value="" name="salary" class="form-control" required>
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
            ajax: "{{ route('salary.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user.first_name',
                    name: 'user.first_name'
                },
                {
                    data: 'salary',
                    name: 'salary'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('body').on('click', '.editSalary', function() {
            var salary_id = $(this).data('id');
            $.get("{{ url('salary') }}" + '/' + 'edit/' + salary_id, function(
                data) {
                $('#exampleModalCenter').modal('show');
                $('#salary_id').val(data.id);
                $('#user_id').val(data.user_id);
                $('#salary').val(data.salary);
            });
        });

        $('body').on('click', '.deleteSalary', function() {
            var salary_id = $(this).data("id");
            alert("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ url('salary') }}" + '/' + salary_id,
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
