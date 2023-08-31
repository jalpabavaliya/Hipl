@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <div class="w3-panel w3-card card ">
            <div id="white">
                <form>
                    <h4 style="font-family: Poppins; font-size: 30px;font-weight: 600;line-height: 32px;letter-spacing: 0px;text-align: left;color: #05004E;  font-weight: bold;">Add Employee</h4>
                    <p style="font-family: Poppins;font-size: 20px;font-weight: 500;line-height: 30px;letter-spacing: 0px;text-align: left;color: #78819F">Basic Details</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Employee code</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Enter first name</label>
                                <input type="email" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Enter Middle name</label>
                                <input type="email" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Enter last name</label>
                                <input type="email" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Enter mobile number</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Enter Email</label>
                                <input type="email" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <input type="date" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Department</label>
                                <input type="email" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Enter password</label>
                                <input type="email" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-outline my-3">
                                <textarea class="form-control">
                                    
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn bg-gradient-secondary">Cancel</button>
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
