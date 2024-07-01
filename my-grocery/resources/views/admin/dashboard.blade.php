<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.css" integrity="sha512-YEwcgX5JXVXKtpXI4oXqJ7GN9BMIWq1rFa+VWra73CVrKds7s+KcOfHz5mKzddIOLKWtuDr0FzlTe7LWZ3MTXw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <i class="bx bxl-codepen"></i>
            <span>Kowalski Grocery</span>
        </div>

        <div class="search">
            <i class='bx bx-search' ></i>
            <input type="text" class="search-bar" placeholder="Search...">
        </div>

        <div class="notification-logo">
            <i class='bx bx-bell'></i>
        </div>
    </header>

    <div class="main-body">
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
                    <a href="#">
                        <i class="bx bx-list-check"></i>
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

    
        <!-- Start Main -->
        <div class="main-content">
            <div class="main-title">
                <p class="font-weight-bold">Dashboard</p>
            </div>

            <div class="main-cards">
                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">PRODUCTS</p>
                        <span class="material-symbols-outlined text-blue">inventory_2</span>
                    </div>
                    <span class="text-primary font-weight-bold">249</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">PURCHASE ORDERS</p>
                        <span class="material-symbols-outlined text-orange">add_shopping_cart</span>
                    </div>
                    <span class="text-primary font-weight-bold">83</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">SALES ORDERS</p>
                        <span class="material-symbols-outlined text-green">shopping_cart</span>
                    </div>
                    <span class="text-primary font-weight-bold">79</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">INVENTORY ALERTS</p>
                        <span class="material-symbols-outlined text-red">notification_important</span>
                    </div>
                    <span class="text-primary font-weight-bold">56</span>
                </div>
            </div>

            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Top 5 Products</p>
                    <div id="bar-chart"></div>
                </div>

                <div class="charts-card">
                    <p class="chart-title">Purchase and Sales Orders</p>
                    <div id="area-chart"></div>
                </div>
            </div>
        </div>
        <!-- End Main -->
        

    <script src="{{ asset('admin-css/js/index.js') }}"></script>

    
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.2/apexcharts.min.js" integrity="sha512-3BIgFs7OIA76S6nx4QMAiSPlGXgCN+eITFIY6q0q0sFPxkuVzVXy0Vp/yQfXP3wyf+DmRpHRzEw3fQc/yrhk4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


</html>