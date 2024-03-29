
<!-- Slider  -->
<?php include 'Views/frontend/partitions/slider.php'?>
<!-- Body  -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-sub heading-sub2 text-center">
                <h5>SẢN PHẨM MỚI NHẤT</h5>
            </div>
            <div class="row products-list">
                    <?php
                    if($products){
                        // var_dump($products);
                        foreach($products as $product){
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card product-item">
                                <a href="?controller=home&action=detail&id=<?php echo $product["id"]?>" class="product-item-link">
                                    <img   class="img-fluid" alt="Responsive image" src="<?php echo $product["image"] ?>" title="<?php echo $product["name"]?>"class="card-img-top" alt="...">
                                <span class="badge-new">
                                    New
                                </span>
                                <div class="card-body">
                                    <p  class="text-center card-text item-name" title="<?php echo $product["name"]?>" > <?php echo $product["name"]?></p>
                                    <p  class="text-center card-text item-price"><?php echo number_format((int)$product["price"]) ."₫"?></p>
                                </div>
                                </a>
                                <button onclick="getProductInfor('<?php echo htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8'); ?>')"  class="btn-add-to-cart">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </div>
                        </div>    
                    <?php
                        }
                    }else{
                        echo '<h1>Chưa có sản phẩm</h1>';
                    }
                    ?>
            </div>
        </div>
    </div>
 </div>