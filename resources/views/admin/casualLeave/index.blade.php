@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <div class="w3-panel w3-card card ">
            <div id="white">
                <form method="POST" action="{{ route('casual.store') }}">
                @csrf
                    <h4 style="font-family: Poppins; font-size: 30px;font-weight: 600;line-height: 32px;letter-spacing: 0px;text-align: left;color: #05004E;  font-weight: bold;">Casual Leave</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" name="leave" value="{{ $data->number_of_leave }}">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
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
            ajax: "{{ route('employee.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'date_of_joining',
                    name: 'date_of_joining'
                },
                {
                    data: 'email',
                    name: 'email'
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
