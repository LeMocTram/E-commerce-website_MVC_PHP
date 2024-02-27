<div class="dir-product">
     <div class="col-md-12">
        <div class="container">
            <ul style="display:flex; ">
                <li class="dir-name"><a href="?controller=home">ClothesForBoy</a></li>
                <li class="dir-name">/</li>
                <li class="dir-name">
                    <a href="?controller=home&action=show&category_id=<?php echo $productDetail['category_id']?>">
                        <?php
                            if ($productDetail['category_id']==='1') {
                                echo "ÁO NAM";
                            }elseif ($productDetail['category_id']==='2') {
                                echo "QUẦN NAM";
                            }elseif ($productDetail['category_id']==='3') {
                                echo "GIÀY DÉP";
                            }else{
                                echo "PHỤ KIỆN";
                            }
                        ?>
                    </a>
                </li>
                <li class="dir-name">/</li>
                <li class="dir-name"><a href="#"><?php echo $productDetail['name']?></a></li>
            </ul>
        </div>
    </div>
<?php 
if(isset($productDetail)){
    // echo "<pre>";
    // print_r($productDetail);
    // die;
    if($productDetail['category_id']==='1'){
        $chooseSize='Views/frontend/img/choose-size-ao.png';
    }elseif ($productDetail['category_id']==='2') {
        $chooseSize='Views/frontend/img/choose-size-quan.png';
    }elseif ($productDetail['category_id']==='3') {
        $chooseSize='Views/frontend/img/choose-size-giay.png';
    }elseif ($productDetail['category_id']==='4') {
        $chooseSize='#';
    }
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
                        
                        <p>SIZE <span>*</span> <a target="_blank" href="<?php echo $chooseSize?>">Hướng dẫn chọn size</a></p>
                        <?php
                           if($productDetail['category_id']==='1'){
                               echo '<select name="size-option" id="size-option">
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="l">XL</option>
                                        <option value="l">XXL</option>
                                    </select>';
                            }elseif ($productDetail['category_id']==='2') {
                                 echo '<select name="size-option" id="size-option">
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="l">XL</option>
                                        <option value="l">XXL</option>
                                    </select>';
                            }elseif ($productDetail['category_id']==='3') {
                                echo'<select name="size-option" id="size-option">
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                    </select>';
                            }elseif ($productDetail['category_id']==='4') {
                                echo'<select name="size-option" id="size-option">
                                        <option value="free">Free</option>
                                    </select>';
                            }
                        ?>
                        
                    </div>
                    <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                        <p>SỐ LƯỢNG*</p>
                         <div class="quantity-input">
                          <input class="form-control quantity input-sm" option="1" cart="370699" rel="359264" style="width:60px; text-align:center;padding-right:0px; " value="1" type="number" min="1" max="10">
                        </div>
                    </div> -->
                   
                </div>
                <div class="row wraps-btn">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <button class="btn-buy" onclick="getProductInfor('<?php echo htmlspecialchars(json_encode($productDetail), ENT_QUOTES, 'UTF-8'); ?>')">
                        <a href="?controller=home&action=cart"><i class="fa-solid fa-arrow-right"></i><i class="fa-solid fa-cart-shopping"></i> Đăng ký mua <i class="fa-solid fa-arrow-left"></i></a></button>
                    </div>
                    <div class="addToCart col-md-6 col-sm-6 col-xs-6">
                        <a class="addToCart-link" onclick="getProductInfor('<?php echo htmlspecialchars(json_encode($productDetail), ENT_QUOTES, 'UTF-8'); ?>')" > + Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-outstanding">

    </div>
</div>

