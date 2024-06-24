// Sidebar Toggle

var sidebarOpen = false;
var sidebar = document.getElementById('sidebar');

function openSideBar() {
    if (!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSideBar() {
    if (sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}