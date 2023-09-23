<!-- Sidebar Toggle (Topbar) -->
<form class="form-inline">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav d-flex justify-content-between w-100">
    <!-- Nav Item - User Information -->
    {{-- <div class="d-inline-block">
        <div class="content">
            <div class="widget clock" id="okinawa" data-timezone="+7">
              <div class="hand seconds"></div>
              <div class="hand minutes"></div>
              <div class="hand hours"></div>
              <div class="hand-cap"></div>
              <label>Jakarta</label>
            </div>
        </div>
    </div> --}}
    <div id="clock" class="my-auto"> 
        <h5 id="date" class="text-gray-600"></h5>
        <p id="time" class="text-gray-600"></p>
    </div>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <div class="d-flex flex-column">
                <span class="d-none d-lg-inline text-gray-600 text-capitalize text-right">{{ Auth::user()->name }}</span>
                @if (Auth::user()->role->name=='CEO & Founder')
                    <span class="badge bg-inverse-danger role_name">{{ Auth::user()->role->name }}</span>
                    @elseif (Auth::user()->role->name=='Admin')
                    <span class="badge bg-inverse-warning role_name">{{ Auth::user()->role->name }}</span>
                    @elseif (Auth::user()->role->name=='User')
                    <span class="badge bg-inverse-success role_name">{{ Auth::user()->role->name }}</span>
                    @elseif (Auth::user()->role->name=='Staff')
                    <span class="badge bg-inverse-info role_name">{{ Auth::user()->role->name }}</span>
                    @elseif (Auth::user()->role->name=='Employee')
                    <span class="badge bg-inverse-dark role_name">{{ Auth::user()->role->name }}</span>
                @endif
            </div>

            <div class="topbar-divider d-none d-sm-block"></div>

            <img class="img-profile rounded-circle"
                src="{{ asset('images/users/default_profile.svg') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>