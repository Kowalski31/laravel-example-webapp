<!-- Start Sidebar -->
<aside class="sidebar">
            <div class="top">
                <i class="bx bx-menu" id="btn"></i>
            </div>
            
            <div class="user">
                <img src="{{ asset('avaa.jfif') }}" alt="me" class="user-image">
                <div>
                    <p class="bold">Kowalski</p>
                    <p>Admin</p>
                </div>
            </div>

            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bx bxs-grid-alt"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                    <!-- <span class="tooltip">Dashboard</span> -->
                </li>

                <li>
                    <a href="#">
                        <i class="bx bxs-shopping-bag"></i>
                        <span class="nav-item">Products</span>
                    </a>
                    <!-- <span class="tooltip">Products</span> -->
                </li>

                <li>
                    <a href="{{ route('categories') }}">
                        <i class='bx bx-category-alt'></i>
                        <span class="nav-item">Categories</span>
                    </a>
                    <!-- <span class="tooltip">Categories</span> -->
                </li>

                <li>
                    <a href="#">
                        <i class="bx bxs-food-menu"></i>
                        <span class="nav-item">Orders</span>
                    </a>
                    <!-- <span class="tooltip">Orders</span> -->
                </li>

                <li>
                    <a href="#">
                        <i class="bx bx-body"></i>
                        <span class="nav-item">Customers</span>
                    </a>
                    <!-- <span class="tooltip">Customers</span> -->
                </li>

                <li>
                    <a href="#">
                        <i class="bx bx-location-plus"></i>
                        <span class="nav-item">Shipping</span>
                    </a>
                    <!-- <span class="tooltip">Shipping</span> -->
                </li>

                <li>
                    <a href="#">
                        <i class="bx bx-cog"></i>
                        <span class="nav-item">Settings</span>
                    </a>
                    <!-- <span class="tooltip">Settings</span> -->
                </li>

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <i class="bx bx-log-out"></i>
                        <span class="nav-item">Logout</span>
                    </a>
                    <!-- <span class="tooltip">Logout</span> -->
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->