

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if(!isset($_GET['category_id'])){
            echo '4 MEN';
        }else{
            switch ($_GET['category_id']) {
                case '1':
                    $heading = 'Áo nam';
                    echo $heading;                   
                    break;
                case '2':
                    $heading = 'Quần nam';
                    echo $heading;
                    break;
                case '3':
                    $heading = 'Giày dép';
                    echo $heading;
                    break;
                case '4':
                    $heading = 'Phụ kiện';
                    echo $heading;
                    break;
                default:
                    echo '4 MEN';
                    break;
            }
        }
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9f134b1586.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header"> 
    <?php include('Views/frontend/partitions/header.php');?>
    <!-- Modal Auth  -->
    <?php include('Views/frontend/partitions/modalAuth.php');?>
    </div>

    <div class="body-container container"  style="min-height: 700px;">
        <div id="notify-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header">
                <strong id="notify" class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
       <?php 

        // echo $_SERVER['REQUEST_URI'];
        if(!isset($_GET['action'])){
            include 'Views\frontend\home\homePage.php';
        }else{
            if($_GET['action']==='show'){
                include 'Views\frontend\home\showProducts.php';
            }elseif($_GET['action']==='detail'){
                include 'Views\frontend\home\detail.php';
            }elseif($_GET['action']==='cart'){
                include 'Views\frontend\home\cart.php';
            }
            // elseif(($_GET['action']==='auth')&&(isset($_COOKIE["id"]))){
            //     include 'Views\frontend\home\homePage.php';
            // }
       }

        // if(!isset($_GET['category_id'])){
        //     /*Home page*/  
        //     include 'Views\frontend\home\homePage.php';
        //     // include 'Views\frontend\home\detail.php';
        // }else{
        //     /*Show product*/  
        //     include 'Views\frontend\home\showProducts.php';
        // }
        // // if(!isset($_GET['category_id'])){
        // //     /*Home page*/  
        // //     include 'Views\frontend\home\homePage.php';
        // // }else{
        // //     /*Show product*/  
        // //     include 'Views\frontend\home\showProducts.php';
        // // }
        ?>
    </div>
    <div class="footer">
        <?php include('Views\frontend\partitions\footer.php'); ?>
    </div>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<style>
    <?php 
    include 'Views/frontend/css/home.css';
    include 'Views/frontend/css/detail.css';
    include 'Views/frontend/css/cart.css';
    include 'Views/frontend/css/responsive.css';
    ?>
</style>
<script>
 <?php 
    include 'Views/frontend/processingEvent/home.js'
   ?>
</script>
</html>