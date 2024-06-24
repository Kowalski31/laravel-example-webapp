<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="grid-container">
        
        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSideBar()">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-symbols-outlined">search</span>
            </div>
            <div class="header-right">
                <span class="material-symbols-outlined">mail</span>
                <span class="material-symbols-outlined">notifications</span>
                <span class="material-symbols-outlined">account_circle</span>
            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-symbols-outlined">inventory</span>My Grocery
                </div>
                <span class="material-symbols-outlined" onclick="closeSideBar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">space_dashboard</span> Dashboard
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-symbols-outlined">inventory_2</span> Products
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-symbols-outlined">fact_check</span> Inventory
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-symbols-outlined">add_shopping_cart</span> Purchase Orders
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-symbols-outlined">shopping_cart</span> Sales Orders
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-symbols-outlined">poll</span> Reports
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-symbols-outlined">settings</span> Settings
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <p class="font-weight-bold">DASHBOARD</p>
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
                        <span class="material-symbols-outlined text-blue">add_shopping_cart</span> 
                    </div>
                    <span class="text-primary font-weight-bold">83</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">SALES ORDERS</p>
                        <span class="material-symbols-outlined text-blue">shopping_cart</span> 
                    </div>
                    <span class="text-primary font-weight-bold">79</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">INVENTORY ALERT</p>
                        <span class="material-symbols-outlined text-blue">notification_important</span> 
                    </div>
                    <span class="text-primary font-weight-bold">56</span>
                </div>
            </div>
        </main>
        <!-- End Main -->

    </div>

    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin-css/js/dashboard.js') }}"></script>
</body>
</html>

