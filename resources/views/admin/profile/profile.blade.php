@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        {{-- <div>
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                   <li class="nav-item">
                      <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-1" role="tab" aria-controls="profile" aria-selected="true" onclick="openCity(event,'profile-1')">
                       Profile Details
                      </a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#Dashboard" role="tab" aria-controls="dashboard" aria-selected="false"  onclick="openCity(event,'Dashboard')">
                      Dashboard
                      </a>
                   </li>
                 </ul>

                 <div id="profile-1" class="tab-pane fade  active m-2">
                    <div class="container-fluid bg-white p-4" style="border-radius: 20px;">
                        <h4>Profile Details</h4>
                        <div class="row">
                            <div class="col-2 text-secondary py-3">
                              <p>Employee Code</p>
                              <p>First Name</p>
                              <p>Middle Name</p>
                              <p>Last Name</p>
                              <p>Mobile No.</p>
                              <p>Email</p>
                              <p>Date Of Birth</p>
                              <p>Department</p>
                              <p>Date Of Joining</p>
                              <p>Address</p>
                            </div>
                            <div class="col-1 text-secondary py-3 fw-bold">
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                              <p>:</p>
                            </div>
                            <div class="col-9 py-3">
                              <p>000000</p>
                              <p>John</p>
                              <p>Gordon</p>
                              <p>Smith</p>
                              <p>+91 9283236237</p>
                              <p>demo@gmail.com</p>
                              <p>01/01/2004</p>
                              <p>Flutter</p>
                              <p>01/01/2004</p>
                              <p>302, Angle squre, near silver <br> bussiness hub, vip circle, mota <br> varachha, surat - 394101</p>
                            </div>
                          </div>
                    </div>
                 </div>


                 <div id="Dashboard" class="tab-pane fade m-2">
                    wqdesaoiufi
                    dsfhdkj
                    sdfhndjkfh
                 </div>
             </div>
        </div> --}}

        <div class="w3-row w3-container fluid mt-3">
            <a onclick="openCity(event, 'London');">
                <div class="w3-half tablink w3-bottombar w3-border-blue w3-padding active">Profile Details</div>
            </a>
            <a onclick="openCity(event, 'Paris');">
                <div class="w3-half tablink w3-bottombar w3-padding">Edit Profile</div>
            </a>
        </div>


        <div id="London" class="w3-container city mt-5">
            <div class="container-fluid bg-white p-4" style="border-radius: 20px;">
                <h4>Profile Details</h4>
                <div class="row">
                    <div class="col-2 text-secondary py-3">
                        <p>Employee Code</p>
                        <p>First Name</p>
                        <p>Middle Name</p>
                        <p>Last Name</p>
                        <p>Mobile No.</p>
                        <p>Email</p>
                        <p>Date Of Birth</p>
                        <p>Department</p>
                        <p>Date Of Joining</p>
                        <p>Address</p>
                    </div>
                    <div class="col-1 text-secondary py-3 fw-bold">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-9 py-3">
                        <p>{{ isset($user->emp_code) ? $user->emp_code : 'N/A' }}</p>
                        <p>{{ isset($user->first_name) ? $user->first_name : 'N/A' }}</p>
                        <p>{{ isset($user->middle_name) ? $user->middle_name : 'N/A' }}</p>
                        <p>{{ isset($user->last_name) ? $user->last_name : 'N/A' }}</p>
                        <p>{{ isset($user->mobile) ? $user->mobile : 'N/A' }}</p>
                        <p>{{ isset($user->email) ? $user->email : 'N/A' }}</p>
                        <p>{{ isset($user->birth_date) ? $user->birth_date : 'N/A' }}</p>
                        <p>
                            @foreach ($departs as $depart)
                                @if ($depart->id == $user->dept)
                                    {{ isset($depart->name) ? $depart->name : 'N/A' }}
                                @endif
                            @endforeach
                        </p>
                        <p>{{ isset($user->date_of_joining) ? $user->date_of_joining : 'N/A' }}</p>
                        <p>{{ isset($user->address) ? $user->address : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="Paris" class="w3-container city mt-5" style="display:none">
            <div class="container-fluid bg-white p-4" style="border-radius: 20px;">
                <h4>Profile Details</h4>

                <form action="{{ route('profile.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id"
                        value="@if(!empty($user)){{$user->id}}@endif" id="user_id">
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <label class="form-label">Employee Code</label>
                            <div class="input-group input-group-outline">
                                <input type="text" name="emp_code" placeholder="Employee Code"
                                    value="@if(!empty($user)){{$user->emp_code}}@endif"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label class="form-label">First Name</label>
                            <div class="input-group input-group-outline">
                                <input type="text" name="first_name" placeholder="First Name"
                                    value="@if(!empty($user)){{ $user->first_name }}@endif"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label class="form-label">Middle Name</label>
                            <div class="input-group input-group-outline">
                                <input type="text" name="middle_name" placeholder="Middle Name"
                                    value="@if(!empty($user)){{ $user->middle_name }}@endif"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label class="form-label">Last Name</label>
                            <div class="input-group input-group-outline">
                                <input type="text" name="last_name" placeholder="Last Name"
                                    value="@if(!empty($user)){{ $user->last_name }}@endif"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label class="form-label">Mobile Number</label>
                            <div class="input-group input-group-outline">
                                <input type="text" name="mobile" placeholder="Mobile Number"
                                    value="@if(!empty($user)){{ $user->mobile }}@endif"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label class="form-label">Email</label>
                            <div class="input-group input-group-outline">
                                <input type="email" name="email" placeholder="Email"
                                    value="@if(!empty($user)){{ $user->email }}@endif"
                                    class="form-control">
                            </div>
                        </div>


                        <div class="col-md-4 mt-4">
                            <label>Date of birth</label>
                            <div class="input-group input-group-outline">
                                <input type="date" name="birth_date" value="@if(!empty($user)){{ $user->birth_date }} @endif"class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label class="form-label">Department</label>
                            <div class="input-group input-group-outline">
                                {{-- <input type="text" class="form-control"> --}}
                                <select class="form-control" name="dept" id="exampleFormControlSelect1" selected>
                                    @foreach ($departs as $depart)
                                        <option value="{{ $depart->id }}"
                                            @if ($user->dept == $depart->id) selected @endif>{{ $depart->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label>Date of joining</label>
                            <div class="input-group input-group-outline">
                                <input type="date" name="date_of_joining" required
                                    value="@if (!empty($user)) {{ $user->date_of_joining }} @endif"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <textarea class="form-control" name="address" rows="5" placeholder="Address" spellcheck="false">@if(!empty($user)){{$user->address}}@endif</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary px-5" type="submit">Update</button>
                        <button class="btn btn-secondary text-dark ms-2 px-5" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>
@include('layouts.footer')
{!! Toastr::message() !!}
<script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-border-blue", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-border-blue";
    }
</script>
<script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
