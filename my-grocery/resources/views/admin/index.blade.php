<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin Dashboard</title>
</head>
<body>
    <aside class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx blx-codepen"></i>
                <span>My Grocery</span>
            </div>

            <div class="bx bx-menu" id="btn"></div>
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
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span></span>
            </li>
        </ul>
    </aside>
</body>
</html>