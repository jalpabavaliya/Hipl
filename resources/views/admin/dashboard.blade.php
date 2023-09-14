@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <div class="row mt-5">
            <div class="col-10">
                <p class="btn btn-outline-primary w-auto fs-5 fw-bold py-3 px-5" style="background-color: #F7F5FF;">Login
                    Time : 9:30</p>
            </div>
            <div class="col-2">
                <div>
                    <img src="image/boy.jpg" alt="boy" height="120" weight="120" style="border-radius: 50%;">
                </div>
            </div>
        </div>

        <div class="row px-4">
            <div class="col-9">
                <div class="d-flex justify-content-between gap-4 p-3 bg-white mt-4" style="border-radius: 20px;">
                    <div class="text-center rounded w-25 pt-2"
                        style="background-color: #FAFAFA; border-style: solid; border-color: #C8C8C8;">
                        <h4>5</h4>
                        <p>Total Employee</p>
                    </div>
                    <div class="text-center rounded w-25 pt-2"
                        style="background-color: #FFF5FE; border-style: solid; border-color: #FAB8FF;">
                        <h4>2</h4>
                        <p>Total Project</p>
                    </div>
                    <div class="text-center rounded w-25 pt-2"
                        style="background-color: #FFFDF6; border-style: solid; border-color: #FFD954;">
                        <h4>21</h4>
                        <p>Casual Leave</p>
                    </div>
                    <div class="text-center rounded w-25 pt-2"
                        style="background-color: #F7F5FF; border-style: solid; border-color: #C3B8FF;">
                        <h4>5</h4>
                        <p>Taken Leave</p>
                    </div>
                </div>

                <div class="bg-white mt-4 p-4" style="border-radius: 20px;">
                    <h4 class="mb-4">Projects</h4>
                    <table class="table table-bordered data-table table-flush dataTable-table" id="datatable-basic">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Status</th>
                                <th>Productivity</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mob Rules</td>
                                <td>In Progress</td>
                                <td>30%</td>
                                <td>2 Feb 2023</td>
                                <td>2 Feb 2023</td>
                            </tr>
                            <tr>
                                <td>NetPage</td>
                                <td>Complete</td>
                                <td>100%</td>
                                <td>2 Feb 2023</td>
                                <td>2 Feb 2023</td>
                            </tr>
                            <tr>
                                <td>Fare!Tage</td>
                                <td>In Progress</td>
                                <td>30%</td>
                                <td>2 Feb 2023</td>
                                <td>2 Feb 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bg-white mt-4 px-4 pt-4 pb-1" style="border-radius: 20px;">
                    <h4 class="mb-4">Up Coming Leave</h4>
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-8">
                                    <h5>Out Of Surat</h5>
                                </div>
                                <div class="col-2">
                                    <div class="btn btn-warning w-100">Hina Hirpara</div>
                                </div>
                                <div class="col-2">
                                    <div class="btn btn-success w-100">Hr</div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3 bg-white mt-4" style="border-radius: 20px;">
                <div class=" px-4 pt-4 pb-1">
                    <h4 class="mb-4">Up Coming Leave</h4>

                    <div class="row border-bottom py-2">
                        <div class="col-2">
                            <img src="image/boy.jpg" alt="boy" height="45" weight="45" style="border-radius: 50%;">
                        </div>
                        <div class="col-8 ps-4">
                            <span class="fw-bold">Deepika Khant</span><br>
                            <small>Birthday</small>
                        </div>
                        <div class="col-2 text-end">
                            <i class="fa fa-birthday-cake text-info fa-lg pt-3"></i>
                        </div>
                    </div>

                    <div class="row border-bottom py-2">
                        <div class="col-2">
                            <img src="image/boy.jpg" alt="boy" height="45" weight="45" style="border-radius: 50%;">
                        </div>
                        <div class="col-8 ps-4">
                            <span class="fw-bold">Deep Jethva</span><br>
                            <small>Birthday</small>
                        </div>
                        <div class="col-2 text-end">
                            <i class="fa fa-birthday-cake text-info fa-lg pt-3"></i>
                        </div>
                    </div>

                    <div class="row border-bottom py-2">
                        <div class="col-2">
                            <img src="image/boy.jpg" alt="boy" height="45" weight="45" style="border-radius: 50%;">
                        </div>
                        <div class="col-8 ps-4">
                            <span class="fw-bold">Bhaudipi Khant</span><br>
                            <small>1th Work Anniversary</small>
                        </div>
                        <div class="col-2 text-end">
                            <i class="fa fa-birthday-cake text-info fa-lg pt-3"></i>
                        </div>
                    </div>

                    <div class="row border-bottom py-2">
                        <div class="col-2">
                            <img src="image/boy.jpg" alt="boy" height="45" weight="45" style="border-radius: 50%;">
                        </div>
                        <div class="col-8 ps-4">
                            <span class="fw-bold">Deepika Khant</span><br>
                            <small>Birthday</small>
                        </div>
                        <div class="col-2 text-end">
                            <i class="fa fa-birthday-cake text-info fa-lg pt-3"></i>
                        </div>
                    </div>


                    <div class="row border-bottom py-2">
                        <div class="col-2">
                            <img src="image/boy.jpg" alt="boy" height="45" weight="45" style="border-radius: 50%;">
                        </div>
                        <div class="col-8 ps-4">
                            <span class="fw-bold">Deep Jethva</span><br>
                            <small>Birthday</small>
                        </div>
                        <div class="col-2 text-end">
                            <i class="fa fa-birthday-cake text-info fa-lg pt-3"></i>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-2">
                            <img src="image/boy.jpg" alt="boy" height="45" weight="45" style="border-radius: 50%;">
                        </div>
                        <div class="col-8 ps-4">
                            <span class="fw-bold">Bhaudipi Khant</span><br>
                            <small>1th Work Anniversary</small>
                            <i class="fa fa-party-horn"></i>
                        </div>
                        <div class="col-2 text-end">
                            <i class="fa fa-birthday-cake text-info fa-lg pt-3"></i>
                        </div>
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
{{-- <style>
    .w3-panel {
        margin-top: -65px;
        margin-left: 10px;
        margin-right: 23px;
    }

    .paginate_button .page-item {
        background-color: #ffffff !important;
    }
</style> --}}
