<!-- Start Sidebar -->
<aside class="sidebar">

    <div class="user  align-items-center p-3 border-top border-bottom">
        <img src="{{ asset('avaa.jfif') }}" alt="me" class="rounded-circle me-2" style="width: 50px; height: 50px;">
        <div>
            <p class="fw-bold mb-0">Kowalski</p>
            <p class="text-info mb-0">Admin</p>
        </div>
    </div>

    <ul class="nav flex-column p-3">
        <li class="">
            <a href="{{ route('admin.dashboard') }}" class=" align-items-center">
                <i class="bx bxs-grid-alt me-2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('product') }}" class="d-flex align-items-center">
                <i class="bx bxs-shopping-bag me-2"></i>
                <span>Products</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('category') }}" class="d-flex align-items-center">
                <i class="bx bx-category-alt me-2"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="">
            <a href="#" class="d-flex align-items-center">
                <i class="bx bxs-food-menu me-2"></i>
                <span>Orders</span>
            </a>
        </li>

        <li class="">
            <a href="#" class="d-flex align-items-center">
                <i class="bx bx-body me-2"></i>
                <span>Customers</span>
            </a>
        </li>

        <li class="">
            <a href="#" class="d-flex align-items-center">
                <i class="bx bx-location-plus me-2"></i>
                <span>Shipping</span>
            </a>
        </li>

        <li class="">
            <a href="#" class="d-flex align-items-center">
                <i class="bx bx-cog me-2"></i>
                <span>Settings</span>
            </a>
        </li>
        
        <li class="">
            <a href="{{ route('logout') }}" class="d-flex align-items-center"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <i class="bx bx-log-out me-2"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar -->
