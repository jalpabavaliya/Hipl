@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10" id="ajaxModelexa" aria-hidden="true">
        <div class="w3-panel w3-card card ">
            <div id="white">
                <form method="post" id="EmpForm" name="EmpForm" action="{{ empty($user) ? route('employee.store') : route('employee.edit', ['id' => $user->id]) }}">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">

                    <h4 style="font-family: Poppins; font-size: 30px; font-weight: 600; line-height: 32px; letter-spacing: 0px; text-align: left; color: #05004E;">
                        @if (!empty($user))
                            Edit Employee
                        @else
                            Add Employee
                        @endif
                    </h4>
                    <p style="font-family: Poppins;font-size: 20px;font-weight: 500;line-height: 30px;letter-spacing: 0px;text-align: left;color: #78819F">Basic Details</p>
                    @if (!empty($user))
                        @method('POST')
                    @endif
                    <div class="row">
                        <div class="col-md-3 my-3">
                            <label class="form-label">Employee code</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="emp_code" name="emp_code" value="@if(!empty($user)){{$user->emp_code}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <label class="form-label">Enter first name</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="@if(!empty($user)){{$user->first_name}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <label class="form-label">Enter Middle name</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="@if(!empty($user)){{$user->middle_name}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <label class="form-label">Enter last name</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="@if(!empty($user)){{$user->last_name}}@endif" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-3">
                            <label class="form-label">Enter mobile number</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="@if(!empty($user)){{$user->mobile}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <label class="form-label">Enter Email</label>
                            <div class="input-group input-group-outline ">
                                <input type="email" class="form-control" id="email" name="email" value="@if(!empty($user)){{$user->email}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <label class="form-label">Date of Birth</label>
                            <div class="input-group input-group-outline ">
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="@if(!empty($user)){{$user->birth_date}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <label class="form-label">Department</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="dept" name="dept" value="@if(!empty($user)){{$user->dept}}@endif" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Date of Joining</label>
                            <div class="input-group input-group-outline ">
                                <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" value="@if(!empty($user)){{$user->date_of_joining}}@endif" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Enter password</label>
                            <div class="input-group input-group-outline ">
                                <input type="text" class="form-control" id="password" name="password" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 my-3">
                            <label class="form-label">Address</label>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control" name="address" id="address" placeholder="address">@if(!empty($user)){{$user->address}}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" id="savedata" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn bg-gradient-secondary"><a href="{{ route('employee') }}">Cancel </a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
{!! Toastr::message() !!}
