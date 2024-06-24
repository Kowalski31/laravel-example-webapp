<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Sidebar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Custom CSS for Sidebar */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        #sidebar {
            background: #343a40;
            color: #fff;
            min-height: 100vh;
            width: 250px;
            transition: all 0.3s;
        }
        #sidebar.shrinked {
            width: 80px;
        }
        .sidebar-header {
            padding: 20px;
            background: #6c757d;
        }
        .sidebar-header .avatar img {
            max-width: 50px;
            border-radius: 50%;
        }
        .sidebar-header .title {
            margin-left: 10px;
        }
        .sidebar-header .title h1 {
            margin: 0;
            font-size: 1.2rem;
        }
        .sidebar-header .title p {
            margin: 0;
            font-size: 0.8rem;
            color: #ddd;
        }
        .list-unstyled {
            padding: 0;
        }
        .list-unstyled li {
            padding: 10px;
        }
        .list-unstyled li a {
            color: #ddd;
            text-decoration: none;
        }
        .list-unstyled li a:hover {
            color: #fff;
            background: #495057;
            border-radius: 5px;
        }
        .collapse .list-unstyled li a {
            padding-left: 30px;
        }
        .heading {
            padding: 10px;
            font-size: 0.9rem;
            color: #bbb;
            text-transform: uppercase;
        }
        .sidebar-toggle {
            position: absolute;
            top: 20px;
            left: 260px;
            cursor: pointer;
            color: #343a40;
            background: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .sidebar-toggle.active i {
            transform: rotate(180deg);
        }
        .page-content {
            margin-left: 250px;
            transition: all 0.3s;
            width: 100%;
        }
        .page-content.active {
            margin-left: 80px;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Toggle Button -->
        <div class="sidebar-toggle">
            <i class="fas fa-long-arrow-alt-left"></i>
        </div>
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar">
                    <img src="https://via.placeholder.com/50" alt="..." class="img-fluid rounded-circle">
                </div>
                <div class="title">
                    <h1 class="h5">Mark Stephen</h1>
                    <p>Web Designer</p>
                </div>
            </div>
            <!-- Sidebar Navigation Menus-->
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li><a href="#"> <i class="icon-home fas fa-home"></i> Home </a></li>
                <li><a href="#"> <i class="icon-grid fas fa-th-large"></i> Category </a></li>
                
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="icon-windows fas fa-box"></i> Products
                    </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Add Product</a></li>
                        <li><a href="#">View Product</a></li>
                        <!-- <li><a href="#">Page</a></li> -->
                    </ul>
                </li>

                <li><a href="#"> <i class="icon-grid fas fa-shopping-cart"></i> Orders </a></li>
            </ul>
        </nav>
        <!-- Page Content -->
        <div class="page-content p-4">
            <h2>Main Content Area</h2>
            <p>This is where the main content goes.</p>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.sidebar-toggle').on('click', function () {
            $(this).toggleClass('active');
            $('#sidebar').toggleClass('shrinked');
            $('.page-content').toggleClass('active');

            if ($(this).hasClass('active')) {
                $(this).find('i').attr('class', 'fas fa-long-arrow-alt-right');
            } else {
                $(this).find('i').attr('class', 'fas fa-long-arrow-alt-left');
            }
        });
    </script>
</body>
</html>
