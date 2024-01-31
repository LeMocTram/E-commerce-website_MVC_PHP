<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Views\frontend\css\header.css">
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
                            <span>0</span> 
                            Sản phẩm
                        </em> trong giỏ hàng
                    </small>
                    <ul class="cart-list">
                        <li class="cart-item">
                            <img class="cart-item-img" src="https://4menshop.com/cache/image/70/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138-10928.JPG" alt="">
                            <div class="cart-item-infor">
                                <a href="#" class="cart-item-name"><h5>Ao vest ABCD</h5></a>
                                <p class="cart-item-price">1 X 397.000</p>
                            </div>
                        </li>
                        <li class="cart-item">
                            <img class="cart-item-img" src="https://4menshop.com/cache/image/70/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138-10928.JPG" alt="">
                            <div class="cart-item-infor">
                                <a href="#" class="cart-item-name"><h5>Ao vest ABCD</h5></a>
                                <p class="cart-item-price">1 X 397.000</p>
                            </div>
                        </li>
                        <li class="cart-item">
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
                        </div>
                    </ul>
                </div>
        </div>
    </div>
</body>
</html>
