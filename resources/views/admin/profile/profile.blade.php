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
                        <p>000000</p>
                        <p>John</p>
                        <p>Gordon</p>
                        <p>Smith</p>
                        <p>+91 9283236237</p>
                        <p>demo@gmail.com</p>
                        <p>01/01/2004</p>
                        <p>Flutter</p>
                        <p>01/01/2004</p>
                        <p>302, Angle squre, near silver <br> bussiness hub, vip circle, mota <br> varachha, surat -
                            394101</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="Paris" class="w3-container city mt-5"  style="display:none">
            <div class="container-fluid bg-white p-4" style="border-radius: 20px;">
                <h4>Profile Details</h4>

                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Employee Code</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label>Date of birth</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="date" class="form-control">
                              </div>
                              
                            {{-- <div class="input-group input-group-outline my-3">
                                <label class="form-label">Date of birth</label>
                                <input type="date" class="form-control">
                            </div> --}}
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Department</label>
                            <div class="input-group input-group-outline my-3">
                                {{-- <input type="text" class="form-control"> --}}
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <label>Date of joining</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="date" class="form-control">
                              </div>
                            {{-- <div class="input-group input-group-outline my-3">
                                <label class="form-label">Date of joining</label>
                                <input type="date" class="form-control">
                            </div> --}}
                        </div>

                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                            <textarea class="form-control" rows="5" placeholder="Address" spellcheck="false"></textarea>
                            </div>

                            {{-- <div class="input-group input-group-outline my-3">
                                <label class="form-label">Department</label>
                                <input type="textarea" class="form-control">
                            </div> --}}
                        </div>

                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary px-5" type="button">Update</button>
                        <button class="btn btn-secondary text-dark ms-2 px-5" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>
@include('layouts.footer')

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
