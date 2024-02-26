<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9f134b1586.js" crossorigin="anonymous"></script>

</head>
<body>
<script>
    var myToken = localStorage.getItem('token');

// Nếu không có biến trong localStorage
if (!myToken) {
    // Chuyển hướng đến trang khác
    window.location.href = '?controller=login&action=logout';
}

</script>

    <header class="header-dashboard">
        <!-- <h1>Dashboard</h1> -->
        <!-- <a type="button" class="btn-logout" href="?controller=login&action=logout">LOGOUT <i class="fa-solid fa-right-from-bracket"></i></a> -->
        <h1>Dashboard</h1>
        <ul class="header-dashboard-list">
            
            <li class="dashboard-list-item"><a type="button" class="dashboard-item-link" href="?controller=dashboard">Manage Products</a></li>
            <li class="dashboard-list-item"><a type="button" class="dashboard-item-link" href="?controller=dashboard&action=manageOders">Manage Orders</a></li>
            <li class="dashboard-list-item"><a type="button" class="dashboard-item-link" href="?controller=dashboard&action=manageCustomers">Manage Account Customers</a></li>
            <li class="dashboard-list-item btn-logout" id="logoutBtn"><a type="button" class="dashboard-item-link"><i class="fa-solid fa-right-from-bracket"></i></a></li>

        </ul>
    </header>
    

    <div class="container mt-5">
        <?php
           
            if(!isset($_GET['action'])){
                 include 'Views/frontend/manage/manageProduct.php';
            }else{
                if(isset($_GET['action'])&& ($_GET['action']==='manageOders')){
                    include 'Views/frontend/manage/manageOrder.php';
                }
                if(isset($_GET['action'])&& ($_GET['action']==='manageCustomers')){
                    include 'Views/frontend/manage/manageCustomer.php';
                }
                if(isset($_GET['action'])&& ($_GET['action']==='edit')){
                    include 'Views/frontend/manage/edit.php';
                }
                if(isset($_GET['action'])&& ($_GET['action']==='detailOrder')){
                    include 'Views/frontend/manage/detailOrder.php';
                }

            }
                    // include 'Views/frontend/manage/edit.php';


        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
      <?php 
        include 'Views/frontend/css/dashboard.css'
      ?>
    </style>
<script>
    <?php
        include 'Views/frontend/processingEvent/dashboard.js'
    ?>
</script>

</html>
