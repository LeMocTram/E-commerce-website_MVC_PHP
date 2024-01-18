 
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
            <?php
                if($products){
                    foreach($products as $product){
                ?>
                    <div class="col-3 ">
                        <div class="card" style=" margin-top:3rem">
                            <img style="max-width:304px;max-height:456px" src="<?php echo $product["image"] ?>"  title="<?php echo $product["name"]?>"class="card-img-top" alt="...">
                            <div class="card-body">
                                
                                <p class="card-text product-name" title="<?php echo $product["name"]?>" > <?php echo $product["name"]?></p>
                                <p class="card-text"><?php echo $product["price"]."đ"?></p>
                                <a href="#" class="btn btn-primary">Mua</a>
                            </div>
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



    <div class="footer"><?php include('Views\frontend\partitions\footer.php');?></div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
   
    .body-container{
        background-color: #f4f4f4;
        margin-top: 100px;
        height: auto;
        p.product-name {
            white-space: nowrap; 
            width: 100%; 
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .container{
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    }

    .footer{
        margin-top: 10px;
        height:300px;
        border: 2px solid red;
    }
</style>

</html>




