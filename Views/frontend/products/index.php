 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9f134b1586.js" crossorigin="anonymous"></script>
</head>
<body>
   
    <div class="body-container">
        <div class="header"> 
        <?php include('Views\frontend\partitions\header.php');?>
        </div>
       
        <div class="container">
           <?php
if($products){
    foreach($products as $product){
        ?>
        <div class="card" style="">
        <img src="<?php echo $product["image"] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            
            <p class="card-text"><?php echo $product["name"]?></p>
            <p class="card-text"><?php echo $product["price"]."đ"?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>

        <?php
    }
}

?>

            

        </div>
    </div>
    <div class="footer">
        <?php include('Views\frontend\partitions\footer.php'); ?>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<style>
    *{
        font-family: Courier New;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
   
    .body-container{
        margin-top: 100px;
    }



</style>

</html>




