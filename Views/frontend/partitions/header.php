<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header-container">
        <div class="logo">
            <a href="?controller=home">
                <img class="logo-image" src="https://4menshop.com/logo.png?v=1" alt="">
            </a>
        </div>
        <div class="catelog">
            <div class="border"></div>
            <a href="?controller=product&action=show&category_id=1">Áo Nam</a>
            <div class="border"></div>
            <a href="?controller=product&action=show&category_id=2">Quần Nam</a>
            <div class="border"></div>
            <a href="?controller=product&action=show&category_id=3">Giày dép</a>
            <div class="border"></div>
            <a href="?controller=product&action=show&category_id=4">Phụ kiện</a>
            <div class="border"></div>
        </div>
        <div class="search">
            <div class="search-wapper"> 
                <i class="fa-solid fa-magnifying-glass"></i>
                <form class="search-input">
                    <input type="text" placeholder="Tìm kiếm">
                </form>
            </div>
        </div>
        <div class="cart">
            <div class="cart-wapper">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="cart-infor">
                    <small>Có 
                        <em class="highlight">
                            <span id="quantity">0</span> 
                            Sản phẩm
                        </em> trong giỏ hàng
                    </small>
                    <ul id="cart-list" class="cart-list">
                        <!-- <li class='cart-item'>
                            <img class="cart-item-img" src="https://4menshop.com/cache/image/70/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138-10928.JPG" alt="">
                            <div class="cart-item-infor">
                                <a href="#" class="cart-item-name"><h5>Ao vest ABCD</h5></a>
                                <p class="cart-item-price">1 X 397.000</p>
                            </div>
                        </li>
                        <div class="cart-item-total">
                            Tổng: 
                        </div>
                        <div class="cart-btn">
                            <a href="#">Gửi đơn hàng</a>
                        </div> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="user">
            <div  id="user" class="user-wapper"> 
               <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </div>


<!-- Modal  -->
 <div id="modal" class="modal">
        <div id="modal-body" class="modal-body">
            <!-- Register form  -->
            <div id="register-form" class="auth-form">
                <div class="auth-form-header">
                    <label class="auth-form-heading">
                        Đăng ký
                    </label>
                    <span id="btn-close-form-register">x</span>
                </div>
                <form class="auth-form-body" action="#">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <button onclick="handleRegister()" class="btn-auth">Đăng ký</button>

                    <span>HOẶC</span>
                    <div class="auth-with">
                        <button class="auth-with-fb"> <i class="fa-brands fa-facebook"></i> Facebook</button>
                        <button class="auth-with-gg"><i class="fa-brands fa-google"></i> Google</button>
                    </div>
                    <div class="policy">
                        Bằng việc đăng ký, bạn đã đồng ý với 4 MEN về
                        <a href="#">Điều khoản dịch vụ</a>
                        &
                        <a href="#">Chính sách bảo mật</a>
                    </div>
                </form>
                <div class="auth-btn-switch">
                    Bạn đã có tài khoản? <span id="auth-btn-switch-login" class="auth-btn-switch-login"> Đăng
                        nhập</span>
                </div>
            </div>

            <!-- Login form  -->
            <div id="login-form" class="auth-form">
                <div class="auth-form-header">
                    <label class="auth-form-heading">
                        Đăng nhập
                    </label>
                    <span id="btn-close-form-login">x</span>
                </div>
                <form class="auth-form-body" action="?controller=home&action=auth" method="post">
                    <input name="eCustomer" type="email" placeholder="Email" required>
                    <input name="pCustomer" type="password" placeholder="Password" required>
                    <button type="submit" name="submit" class="btn-auth">Đăng nhập</button>
                    <span>HOẶC</span>
                    <div class="auth-with">
                        <button class="auth-with-fb"> <i class="fa-brands fa-facebook"></i> Facebook</button>
                        <button class="auth-with-gg"><i class="fa-brands fa-google"></i> Google</button>
                    </div>

                </form>
                <div class="auth-btn-switch">
                    Bạn mới biết đến shopee? <span id="auth-btn-switch-register" class="auth-btn-switch-login"> Đăng
                        ký</span>
                </div>
            </div>
        </div>
    </div>



</body>
<style>
    <?php 
    include 'Views/frontend/css/header.css'
    ?>
</style>
<script>
   <?php 
    include 'Views/frontend/processingEvent/home.js'
    
   ?>
</script>

</html>
