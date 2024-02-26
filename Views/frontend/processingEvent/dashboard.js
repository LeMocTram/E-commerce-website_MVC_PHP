document.addEventListener('DOMContentLoaded', function () {
    var dropdownBtn = document.getElementById('dropdown-btn');
    var menuListDropdown = document.getElementById('menu-list-dropdown');

    dropdownBtn.addEventListener('click', function () {
        if (menuListDropdown.style.display === 'none' || menuListDropdown.style.display === '') {
            menuListDropdown.style.display = 'block';
        } else {
            menuListDropdown.style.display = 'none';
        }
    });
});


document.getElementById('logoutBtn').addEventListener('click', function () {
    // Xóa dữ liệu từ localStorage
    localStorage.removeItem('token'); // Thay 'myVariable' bằng tên của biến bạn muốn xóa
    // Hoặc sử dụng localStorage.clear(); nếu bạn muốn xóa toàn bộ dữ liệu từ localStorage
    window.location.href = '?controller=login&action=logout';
});


