// Header
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

var modal = document.getElementById('modal');
var modalBody = document.getElementById('modal-body');

modal.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = 'none';
        document.getElementById('register-form').style.display = "none";
        document.getElementById('login-form').style.display = "none";
    }
};

modalBody.onclick = function (event) {
    // Ngăn sự kiện bubbling (lan truyền) lên phần tử modal
    event.stopPropagation();
};

btnSwitchLogin.onclick = function () {
    document.getElementById('login-form').style.display = "block";
    document.getElementById('register-form').style.display = "none";
}
btnSwitchRegister.onclick = function () {
    document.getElementById('register-form').style.display = "block";
    document.getElementById('login-form').style.display = "none";
}

// Function to handle logout

function logout() {
    // Ẩn phần tử "logout" và hiển thị phần tử "user"
    document.getElementById('user').style.display = 'flex';
    document.getElementById('logout').style.display = 'none';
    document.getElementById('notify-toast').style.display = 'block';
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    document.getElementById('notify').innerHTML = "Bạn đã đăng xuất";
    myToast.show();
    setTimeout(function () {
        myToast.hide();
        document.getElementById('notify-toast').style.display = 'none';

    }, 1500);
    localStorage.removeItem('idCustomer');
    localStorage.removeItem('cookieCustomerFromSV');
    localStorage.removeItem('hasShownToast');

}

// Toast log-in 
// var myCookieValue = getCookie('cookieCustomerFromSV');
var myCookieValue = localStorage.getItem('cookieCustomerFromSV');
if (myCookieValue) {
    document.getElementById('user').style.display = 'none';
    document.getElementById('logout').style.display = 'flex';
    var hasShownToast = localStorage.getItem('hasShownToast');
    if (!hasShownToast) {
        document.getElementById('notify-toast').style.display = 'block';
        var myToast = new bootstrap.Toast(document.querySelector('.toast'));
        document.getElementById('notify').innerHTML = "Đăng nhập thành công";
        myToast.show();
        setTimeout(function () {
            myToast.hide();
            document.getElementById('notify-toast').style.display = 'none';
        }, 1500);
        localStorage.setItem('hasShownToast', '1');
    }
} else {
    document.getElementById('user').style.display = 'flex';
    document.getElementById('logout').style.display = 'none';

}
// Log-in fail
var passwordWrong = localStorage.getItem('passwordWrong');
if (passwordWrong === "passwordWrong") {
    document.getElementById('notify-toast').style.display = 'block';
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    document.getElementById('notify-toast').style.background = 'red';
    document.getElementById('notify').innerHTML = "Sai mật khẩu";
    myToast.show();
    setTimeout(function () {
        myToast.hide();
        document.getElementById('notify-toast').style.display = 'none';
    }, 1500);
    localStorage.removeItem('passwordWrong');


}

// Xử lí tài khoản không tồn tại hiện toast

var accNoExist = localStorage.getItem('accNoExist');
if (accNoExist === "noExist") {
    document.getElementById('notify-toast').style.display = 'block';
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    document.getElementById('notify-toast').style.background = 'red';
    document.getElementById('notify').innerHTML = "Tài khoản không tồn tại";
    myToast.show();
    setTimeout(function () {
        myToast.hide();
        document.getElementById('notify-toast').style.display = 'none';
    }, 1500);
    localStorage.removeItem('accNoExist');
}

// Xử lí đăng kí email đã tồn tại
var emailExist = localStorage.getItem('emailExist');
if (emailExist === "emailExist") {
    document.getElementById('notify-toast').style.display = 'block';
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    document.getElementById('notify-toast').style.background = 'red';
    document.getElementById('notify').innerHTML = "Email đã được đăng ký";
    myToast.show();
    setTimeout(function () {
        myToast.hide();
        document.getElementById('notify-toast').style.display = 'none';
    }, 1500);
    localStorage.removeItem('emailExist');

}

// Đăng ký thành công
var registerSuccess = localStorage.getItem('createSuccess');
if (registerSuccess === "createSuccess") {
    document.getElementById('notify-toast').style.display = 'block';
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    document.getElementById('notify').innerHTML = "Đăng ký thành công";
    myToast.show();
    setTimeout(function () {
        myToast.hide();
        document.getElementById('notify-toast').style.display = 'none';
    }, 1500);
    localStorage.removeItem('createSuccess');
}



// Gửi đơn hàng
var sendOrder = localStorage.getItem('sendOrder');
if (sendOrder === "success") {
    document.getElementById('notify-toast').style.display = 'block';
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    document.getElementById('notify').innerHTML = "Đặt hàng thành công";
    myToast.show();
    setTimeout(function () {
        myToast.hide();
        document.getElementById('notify-toast').style.display = 'none';
    }, 1500);
    localStorage.removeItem('cartItem');
    localStorage.removeItem('sendOrder');
}



// Gắn sự kiện click vào phần tử "logout"
document.getElementById('logout').addEventListener('click', logout);

// Menu category list
var mobileMenu = document.getElementById('mobile-menu');
var menuList = document.getElementsByClassName('menu-list');
var isClose = true; // Ban đầu menu là đóng

mobileMenu.onclick = function () {
    if (isClose) {
        // Nếu menu là đóng, hiển thị menu list
        for (var i = 0; i < menuList.length; i++) {
            menuList[i].style.display = 'block';
        }
        isClose = false; // Cập nhật trạng thái menu thành mở
    } else {
        // Nếu menu là mở, đóng menu list
        for (var i = 0; i < menuList.length; i++) {
            menuList[i].style.display = 'none';
        }
        isClose = true; // Cập nhật trạng thái menu thành đóng
    }
};


//Body
// Xử lí Cart
var cartItem = [];

function getProductInfor(productData) {
    var product = JSON.parse(productData);
    var existingProductIndex = cartItem.findIndex(item => item.id === product.id); // Tìm kiếm sản phẩm trong giỏ hàng dựa trên id
    if (existingProductIndex !== -1) { // Nếu sản phẩm đã tồn tại trong giỏ hàng
        // Kiểm tra nếu product.quantity không phải là một số hợp lệ
        if (isNaN(product.quantity) || product.quantity <= 0) {
            product.quantity = 1; // Đặt giá trị mặc định cho quantity là 1
        }
        cartItem[existingProductIndex].quantity += product.quantity; // Tăng số lượng sản phẩm
    } else {
        // Kiểm tra nếu product.quantity không phải là một số hợp lệ
        if (isNaN(product.quantity) || product.quantity <= 0) {
            product.quantity = 1; // Đặt giá trị mặc định cho quantity là 1
        }
        cartItem.push(product); // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
    }
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
                                <p class="cart-item-price">` + parseInt(product.price).toLocaleString('en-US') + ` ₫</p>
                                <p class="cart-item-quantity">Số lượng: ` + product.quantity + `</p>
                                <button class="btn-remove-item" onclick="removeItem(` + index + `)"><i class="fa-solid fa-trash"></i></button> <!-- Thêm nút xóa sản phẩm -->
                            </div>
                        </li>`;
        totalPrice += parseInt(product.price) * product.quantity;
    });

    // Append the total price and "Gửi đơn hàng" button only if there are products in the cart
    if (cartItem.length > 0) {
        cartContent += `<div class="cart-item-total">
                            Tổng: ` + totalPrice.toLocaleString('en-US') + ` ₫
                        </div>
                        <div class="cart-btn">
                            <a href="?controller=home&action=cart">Gửi đơn hàng</a>
                        </div>`;
    }

    document.getElementById("cart-list").innerHTML = cartContent;
    document.getElementById("quantity").innerHTML = cartItem.length;
    // console.log('number of product:', cartItem.length);
    if (cartItem.length === 0) {
        document.getElementById("number-product-in-cart").innerHTML = '';
    } else {
        document.getElementById("number-product-in-cart").innerHTML = cartItem.length;
    }

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


function decreaseQuantity() {
    var input = document.getElementById('quantity');
    var currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}

function increaseQuantity() {
    var input = document.getElementById('quantity');
    var currentValue = parseInt(input.value);
    input.value = currentValue + 1;
}

