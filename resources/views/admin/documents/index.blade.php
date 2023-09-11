@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" id="add" data-target="#exampleModalCenter"> --}}
        <a href="{{ url('documents/create') }}" id="add1">Add Document</a>
        {{-- </button> --}}
        <div class="w3-panel w3-card card ">
            <div id="white">
                <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Addhar Card</th>
                            <th>Pan Card</th>
                            <th>Voter Card</th>
                            <th>10 MarkSheet</th>
                            <th>12 MarkSheet</th>
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
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('documents.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'adhar_card',
                    name: 'adhar_card'
                },
                {
                    data: 'pan_card',
                    name: 'pan_card'
                },
                {
                    data: 'voter_card',
                    name: 'voter_card'
                },
                {
                    data: 'standard_10_markshhet',
                    name: 'standard_10_markshhet'
                },
                {
                    data: 'standard_12_markshhet',
                    name: 'standard_12_markshhet'
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
