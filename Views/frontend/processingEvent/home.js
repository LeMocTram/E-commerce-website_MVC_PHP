//Header

var btnAuth = document.getElementById('user');
btnAuth.onclick = function () {
    document.getElementById('modal').style.display = "block";
    document.getElementById('login-form').style.display = "block";
}


var btnCloseFormRegister = document.getElementById('btn-close-form-register');
btnCloseFormRegister.onclick = function () {
    document.getElementById('modal').style.display = "none";
    document.getElementById('register-form').style.display = "none";
}

var btnCloseFormLogin = document.getElementById('btn-close-form-login');
btnCloseFormLogin.onclick = function () {
    document.getElementById('modal').style.display = "none";
    document.getElementById('login-form').style.display = "none";
}

var btnSwitchLogin = document.getElementById('auth-btn-switch-login');
var btnSwitchRegister = document.getElementById('auth-btn-switch-register');

btnSwitchLogin.onclick = function () {
    document.getElementById('login-form').style.display = "block";
    document.getElementById('register-form').style.display = "none";
}
btnSwitchRegister.onclick = function () {
    document.getElementById('register-form').style.display = "block";
    document.getElementById('login-form').style.display = "none";
}

//Body
var cartItem = [];

function getProductInfor(productData) {
    var product = JSON.parse(productData);
    cartItem.push(product);
    console.log(cartItem);
    displayCart();
    saveCart(); // Lưu giỏ hàng vào Local Storage
}

function displayCart() {
    var cartContent = '';
    var totalPrice = 0;

    cartItem.forEach(function (product, index) {
        cartContent += `<li class='cart-item'>
                            <img class="cart-item-img" src="` + product.image + `" alt="">
                            <div class="cart-item-infor">
                                <a href="#" class="cart-item-name"><h5>` + product.name + `</h5></a>
                                <p class="cart-item-price">` + product.price + `</p>
                                <button class="btn-remove-item" onclick="removeItem(` + index + `)"><i class="fa-solid fa-trash"></i></button> <!-- Thêm nút xóa sản phẩm -->
                            </div>
                        </li>`;
        totalPrice += parseFloat(product.price);
    });

    cartContent += `<div class="cart-item-total">
                            Tổng: ` + totalPrice + `.000
                        </div>
                        <div class="cart-btn">
                            <a href="#">Gửi đơn hàng</a>
                        </div>`;

    document.getElementById("cart-list").innerHTML = cartContent;
    document.getElementById("quantity").innerHTML = cartItem.length;
}

function removeItem(index) {
    cartItem.splice(index, 1); // Xóa sản phẩm khỏi giỏ hàng
    displayCart(); // Hiển thị giỏ hàng sau khi xóa
    saveCart(); // Lưu giỏ hàng vào Local Storage sau khi xóa
}

function saveCart() {
    localStorage.setItem('cartItem', JSON.stringify(cartItem)); // Lưu giỏ hàng vào Local Storage
}

// Kiểm tra xem đã có dữ liệu trong Local Storage chưa, nếu có thì lấy ra và gán vào biến cartItem
var storedCartItem = localStorage.getItem('cartItem');
if (storedCartItem) {
    cartItem = JSON.parse(storedCartItem);
    displayCart(); // Hiển thị giỏ hàng từ dữ liệu đã lưu
}
