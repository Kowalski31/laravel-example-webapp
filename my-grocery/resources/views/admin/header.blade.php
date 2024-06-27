<!-- Header -->
<header class="header">
    <div class="menu-icon" onclick="openSideBar()">
        <span class="material-symbols-outlined">menu</span>
    </div>
    <div class="header-left">
        <span class="material-symbols-outlined">search</span>
    </div>
    
    <div class="">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Logout">
        </form>
    </div>

</header>
<!-- End Header -->
