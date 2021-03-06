<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Dreiven PMS <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li class="g_heading">PMS</li>
            <li class="{{ Request::segment(2) === 'index' ? 'active' : null }}"><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            
            <li class="{{ Request::segment(1) === 'rental' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-user-plus"></i><span>Rental</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'active-rental' ? 'active' : null }}"><a href="{{ route('active-rental.index') }}">Active Rental</a></li>
                    <li class="{{ Request::segment(2) === 'not-active-rental' ? 'active' : null }}"><a href="{{ route('not-active-rental.index') }}">Not Active Rental</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(1) === 'billing' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-calculator"></i><span>Billing</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'rental-new' || Request::segment(2) === 'rental-sampaloc' || Request::segment(2) === 'rental-sta-mesa' || Request::segment(2) === 'rental-roxas-district' || Request::segment(2) === 'rental-alr-building' ? 'active' : null }}"><a href="{{ route('rental-new.index') }}">Rental Billing</a></li>
                    <li class="{{ Request::segment(2) === 'meralco-new' ? 'active' : null }}"><a href="{{ route('meralco-new.index') }}">Meralco Billing</a></li>
                    <li class="{{ Request::segment(2) === 'maynilad' ? 'active' : null }}"><a href="javascript:void(0)">Maynilad Billing</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(1) === 'tenant' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-group"></i><span>Tenant</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'active-tenant' ? 'active' : null }}"><a href="{{ route('active-tenant.index') }}">Active Tenant</a></li>
                    <li class="{{ Request::segment(2) === 'not-active-tenant' ? 'active' : null }}"><a href="{{ route('not-active-tenant.index') }}">Not Active Tenant</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(1) === 'apartment' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-building"></i><span>Apartment</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'sampaloc' ? 'active' : null }}"><a href="{{ route('sampaloc.index') }}">Sampaloc List</a></li>
                    <li class="{{ Request::segment(2) === 'sta-mesa' ? 'active' : null }}"><a href="{{ route('sta-mesa.index') }}">Sta. Mesa list</a></li>
                    <li class="{{ Request::segment(2) === 'roxas-district' ? 'active' : null }}"><a href="{{ route('roxas-district.index') }}">Roxas Dist. List</a></li>
                    <li class="{{ Request::segment(2) === 'alr-building' ? 'active' : null }}"><a href="{{ route('alr-building.index') }}">ALR Bldg. List</a></li>
                </ul>
            </li>

            <li class="{{ Request::segment(1) === 'settings' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-gears"></i><span>Settings</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'tenant-status' ? 'active' : null }}"><a href="{{ route('tenant-status.index') }}">Tenant Status</a></li>
                </ul>
            </li>

            <!-- <li class="{{ Request::segment(2) === 'users' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-users"></i><span>User</span></a></li>
            <li class="{{ Request::segment(2) === 'departments' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-control-pause"></i><span>Departments</span></a></li>
            <li class="{{ Request::segment(2) === 'employee' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-user"></i><span>Employee</span></a></li>
            <li class="{{ Request::segment(2) === 'activities' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-equalizer"></i><span>Activities</span></a></li>
            <li class="{{ Request::segment(2) === 'holidays' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-like"></i><span>Holidays</span></a></li>
            <li class="{{ Request::segment(2) === 'events' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-calendar"></i><span>Events</span></a></li>
            <li class="{{ Request::segment(2) === 'payroll' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-briefcase"></i><span>Payroll</span></a></li>
            <li class="{{ Request::segment(2) === 'accounts' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-credit-card"></i><span>Accounts</span></a></li>
            <li class="{{ Request::segment(2) === 'report' ? 'active' : null }}"><a href="javascript:void(0)"><i class="icon-bar-chart"></i><span>Report</span></a></li>
            <li class="g_heading">Project</li>
            <li class="{{ Request::segment(1) === 'project' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Project</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'index2' ? 'active' : null }}"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="{{ Request::segment(2) === 'list' ? 'active' : null }}"><a href="javascript:void(0)">Project list</a></li>
                    <li class="{{ Request::segment(2) === 'taskboard' ? 'active' : null }}"><a href="javascript:void(0)">Taskboard</a></li>
                    <li class="{{ Request::segment(2) === 'ticket' ? 'active' : null }}"><a href="javascript:void(0)">Ticket List</a></li>
                    <li class="{{ Request::segment(2) === 'ticketdetails' ? 'active' : null }}"><a href="javascript:void(0)">Ticket Details</a></li>
                    <li class="{{ Request::segment(2) === 'clients' ? 'active' : null }}"><a href="javascript:void(0)">Clients</a></li>
                    <li class="{{ Request::segment(2) === 'todo' ? 'active' : null }}"><a href="javascript:void(0)">Todo List</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) === 'job' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-briefcase"></i><span>Job Portal</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'index3' ? 'active' : null }}"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="{{ Request::segment(2) === 'positions' ? 'active' : null }}"><a href="javascript:void(0)">Positions</a></li>
                    <li class="{{ Request::segment(2) === 'applicants' ? 'active' : null }}"><a href="javascript:void(0)">Applicants</a></li>
                    <li class="{{ Request::segment(2) === 'resumes' ? 'active' : null }}"><a href="javascript:void(0)">Resumes</a></li>
                    <li class="{{ Request::segment(2) === 'jobsettings' ? 'active' : null }}"><a href="javascript:void(0)">Settings</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) === 'authentication' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-lock"></i><span>Authentication</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'login' ? 'active' : null }}"><a href="javascript:void(0)">Login</a></li>
                    <li class="{{ Request::segment(2) === 'register' ? 'active' : null }}"><a href="javascript:void(0)">Register</a></li>
                    <li class="{{ Request::segment(2) === 'forgotpassword' ? 'active' : null }}"><a href="javascript:void(0)">Forgot password</a></li>
                    <li class="{{ Request::segment(2) === 'error404' ? 'active' : null }}"><a href="javascript:void(0)">Error 404</a></li>
                    <li class="{{ Request::segment(2) === 'error500' ? 'active' : null }}"><a href="javascript:void(0)">Error 500</a></li>
                </ul>
            </li> -->
        </ul>
    </nav>        
</div>