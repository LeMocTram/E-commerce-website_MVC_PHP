<div class="dir-product">
     <div class="col-md-12">
        <ul style="display:flex; ">
            <li class="dir-name"><a href="?controller=home">4MEN</a></li>
            <li class="dir-name">/</li>
            <li class="dir-name"><a href="?controller=home&action=show&category_id=<?php echo $productDetail['category_id']?>"></a></li>
            <li class="dir-name">/</li>
            <li class="dir-name"><a href="#"><?php echo $productDetail['name']?></a></li>
        </ul>
    </div>
<?php 
if(isset($productDetail)){
     
}
?>
</div>
<div class="detail-product row">
    <img class="detail-img col-md-7 col-sm-6" src="<?php echo $productDetail['image'] ?>" alt="">
    <div class="col-md-5 col-sm-6 detail-product-description">
        <div class="detail-header">
            <h3 class="detail-heading-name">
                <?php echo $productDetail['name']?>
            </h3>
            <div class="detail-price">
                <span class="label">Giá bán:</span>
                <span class="price"><?php echo $productDetail['price']?>đ</span>
            </div>
            <div class="detail-body">
                <div class="row select-wraps">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>SIZE <span>*</span> <a href="#">Hướng dẫn chọn size</a></p>
                        <select name="size-option" id="size-option">
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>SỐ LƯỢNG*</p>
                         <div class="quantity-input">
                          <input class="form-control quantity input-sm" option="1" cart="370699" rel="359264" style="width:60px; text-align:center;padding-right:0px; " value="1" type="number" min="1" max="10">
                        </div>
                    </div>
                   
                </div>
                <div class="row wraps-btn">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <button class="btn-buy"><i class="fa-solid fa-cart-shopping"></i> Đăng ký mua</button>
                    </div>
                    <div class="addToCart col-md-6 col-sm-6 col-xs-6">
                        <a class="addToCart-link" onclick="alert('Button clicked!'); return false;" > + Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-outstanding">

    </div>
</div>

