var btn = document.getElementById('btn');
var sidebar = document.querySelector('.sidebar');



btn.onclick = function() {
    sidebar.classList.toggle('active');
}