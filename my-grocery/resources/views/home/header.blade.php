<!-- Header -->
<header class="bg-primary-light">
    <div class="container">
        <div class="row py-2 align-items-center">
            <div class="col-md-6">
                <a href="{{ route('welcome') }}" class="navbar-brand">Logo</a>
            </div>
            <div class="col-md-6 text-end d-flex align-items-center ">
                <span class="me-3 ms-auto">
                    <i class="bi bi-telephone"></i>
                    Call 1300 000 XXX

                </span>

                <!-- User Profile Dropdown -->
                @if ($user)
                    <div class="dropdown">
                        <a href="#" class="me-3" id="userDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ $user->avatar ? asset('user-ava/' . $user->avatar) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 50px;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">"{{ $user->name }}" Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('view_bank') }}">Bank</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
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
                @else
                    <a href="{{ route('login') }}" class="me-3">Sign In</a>
                    <a href="{{ route('register') }}" class="me-3">Register</a>
                    <a href="#" class="me-3"><i class="bi bi-cart"></i></a>
                @endif
            </div>
        </div>
    </div>
</header>
