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
            <ul class="catelog-list">
                <li class="catelog-item"><a href="?controller=home&action=show&category_id=1">Áo Nam</a></li>
                <li class="catelog-item"><a href="?controller=home&action=show&category_id=2">Quần Nam</a></li>
                <li class="catelog-item"><a href="?controller=home&action=show&category_id=3">Giày dép</a></li>
                <li class="catelog-item"><a href="?controller=home&action=show&category_id=4">Phụ kiện</a></li>
            </ul>
            
        </div>
       

        <div class="icon-wapper">
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
                    <span id="number-product-in-cart"></span>
                    <div class="cart-infor">
                        <small>Có 
                            <em class="highlight">
                                <span id="quantity"></span> 
                                Sản phẩm
                            </em> trong giỏ hàng
                        </small>
                        <ul id="cart-list" class="cart-list">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user">
                <div title="Đăng nhập"  id="user" class="user-wapper"> 
                <i class="fa-solid fa-user"></i>
                </div>
                <div title="Đăng xuất" id="logout" class="user-wapper"> 
                <i class="fa-solid fa-right-from-bracket"></i>
                </div>
            </div>
            <div id="mobile-menu" class="btn-menu">
                <div class="menu-wapper"> 
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-list">
        <ul class="menu-list-category">
            <li class="menu-list-category-link"><a href="?controller=home&action=show&category_id=1">Áo Nam</a></li>
            <li class="menu-list-category-link"><a href="?controller=home&action=show&category_id=2">Quần Nam</a></li>
            <li class="menu-list-category-link"><a href="?controller=home&action=show&category_id=3">Giày dép</a></li>
            <li class="menu-list-category-link"><a href="?controller=home&action=show&category_id=4">Phụ kiện</a></li>
        </ul>          
    </div>

<!-- Modal  -->
 

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
