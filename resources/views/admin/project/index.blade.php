@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-12">
            <h3>.......</h3>
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Projects</button>
            <div class="w3-panel w3-card card ">
                <div id="white">
                    <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
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
<style>
    .w3-panel {
    margin-top: -65px;
    margin-left: 10px;
    margin-right: 23px;
}
</style>
