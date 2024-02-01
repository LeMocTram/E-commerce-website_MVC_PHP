 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
    $cate_id= $_GET["category_id"];
    if($cate_id==1){
            echo "Áo nam";
        }elseif($cate_id==2){
            echo "Quần nam";
        }elseif($cate_id==3){
             echo "Giày dép";
        }else{
            echo "Phụ kiện";
        }
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9f134b1586.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="header"> <?php include('Views\frontend\partitions\header.php');?></div>
   

    <div class="body-container" style="min-height: 700px;">
    <br>
    <br>
    <br>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="heading-sub heading-sub2 text-center">
                        <h5>SẢN PHẨM MỚI NHẤT</h5>
                    </div>
                    <div class="row products-list">
                            <?php
                            if($products){
                                foreach($products as $product){
                            ?>
                                <div class="col-3">
                                    <div class="card product-item-new" style=" margin-top:3rem">
                                        <img  class="item-img" src="<?php echo $product["image"] ?>"  title="<?php echo $product["name"]?>"class="card-img-top" alt="...">
                                        <span class="badge-new">
                                            New
                                        </span>
                                        <div class="card-body">
                                            <p  class="text-center card-text item-name" title="<?php echo $product["name"]?>" > <?php echo $product["name"]?></p>
                                            <p  class="text-center card-text item-price"><?php echo $product["price"]."đ"?></p>
                                        </div>
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
    </div>



    <div class="footer"><?php include('Views\frontend\partitions\footer.php');?></div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<style>
    <?php 
        include 'Views/frontend/css/home.css'
    ?>

</style>

</html>




