<!-- Header -->
<header class="bg-primary-light">
    <div class="container">
        <div class="row py-2 align-items-center">
            <div class="col-md-6">
                <a href="#" class="navbar-brand">Logo</a>
            </div>
            <div class="col-md-6 text-end d-flex align-items-center ">
                <span class="me-3 ms-auto">
                    <i class="bi bi-telephone"></i>
                    Call 1300 000 XXX
                </span>
                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <a href="#" class="me-3 " id="userDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bx bx-user-circle" style="font-size: 1.9rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Orders</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                Logout
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
