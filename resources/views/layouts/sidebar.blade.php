<div class="col-xxl-2">
            <hr class="horizontal light mt-0 mb-2">
            <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
                <hr class="horizontal light mt-0 mb-2">
                <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white active bg-gradient-primary" href="{{ url('dashboard') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>dashboard</i>
                                </div>
                                <span class="nav-link-text ms-1">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('employee') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>table_view</i>
                                </div>
                                <span class="nav-link-text ms-1">Employees</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fas fa-user-tie ms-3 fa-xs" style="color:#737791" opacity-10></i> <span class="ms-1 d-none d-sm-inline" style="color:#737791"
                                 opacity-10>Masters</span> </a>
                                <ul class="collapse flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li>
                                    <a href="{{ url('profile') }}" class="nav-link px-3"> <span class="d-none d-sm-inline">Employees</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3"> <span class="d-none d-sm-inline">Leave</span></a>
                                </li>
                            </ul>
                        </li> --}}
            
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('project') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>receipt_long</i>
                                </div>
                                <span class="nav-link-text ms-1">Project Master</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="../pages/virtual-reality.html">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                                </div>
                                <span class="nav-link-text ms-1">Virtual Reality</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="../pages/rtl.html">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>format_textdirection_r_to_l</i>
                                </div>
                                <span class="nav-link-text ms-1">RTL</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="../pages/notifications.html">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>notifications</i>
                                </div>
                                <span class="nav-link-text ms-1">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="../pages/profile.html">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>person</i>
                                </div>
                                <span class="nav-link-text ms-1">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="../pages/sign-in.html">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>login</i>
                                </div>
                                <span class="nav-link-text ms-1">Sign In</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="../pages/sign-up.html">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class=" material-icons" style="color:#737791" opacity-10>assignment</i>
                                </div>
                                <span class="nav-link-text ms-1">Sign Up</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
    <hr class="horizontal light mt-0 mb-2">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ url('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('employee') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Role Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('department') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Department Master</span>
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('project') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Project Master</span>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('casual-leave') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Casual Leave Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('leave') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Leave Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('employee') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Employees Master</span>
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('salary') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Salary Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('leave-record') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Leave Record</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('salary-report') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Salary Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('documents') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Document Proof</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('leave-policy') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class=" material-icons" style="color:#737791" opacity-10>view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Leave Policy</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </aside>
</div>