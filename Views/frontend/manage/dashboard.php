<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="app/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
  <!-- DataTables -->
  <link rel="stylesheet" href="app/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="app/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="app/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/9f134b1586.js" crossorigin="anonymous"></script>
  
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" id="logoutBtn" role="button">
          <i class="fa-solid fa-right-from-bracket"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?controller=dashboard" class="brand-link">
      <img src="app/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="app/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="?controller=dashboard&table=products" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?controller=dashboard&table=orders" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?controller=dashboard&table=customers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php
              if(isset($_GET['table'])){
                echo  ucwords($_GET['table']);
              }
            ?></h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pace</li>
            </ol>
          </div> -->
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
              <?php 
               
                if(!isset($_GET['table'])){
                  echo '';
                }else{
                  if((isset($_GET['table']) && ($_GET['table']==='products'))){
                  include 'Views/frontend/manage/tableProducts.php';
                  }elseif(isset($_GET['table']) && ($_GET['table']==='orders')){
                    include 'Views/frontend/manage/tableOrders.php';
                  }elseif(isset($_GET['table']) && ($_GET['table']==='customers')){
                    include 'Views/frontend/manage/tableCustomers.php';
                  }elseif(isset($_GET['table']) && ($_GET['table']==='trash')){
                    include 'Views/frontend/manage/tableTrash.php';
                  }elseif(isset($_GET['table']) && ($_GET['table']==='orderDetail')){
                    include 'Views/frontend/manage/tableDetailOrders.php';
                  }
                }
              ?>
              
              <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
          <!-- /.row -->
      </div>
  </section>
   
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- pace-progress -->
<script src="app/plugins/pace-progress/pace.min.js"></script>
<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="app/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="app/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="app/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="app/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="app/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="app/plugins/jszip/jszip.min.js"></script>
<script src="app/plugins/pdfmake/pdfmake.min.js"></script>
<script src="app/plugins/pdfmake/vfs_fonts.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="app/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="app/dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>

    


    // Auth login
    var myToken = localStorage.getItem('token');

    // Nếu không có biến trong localStorage
    if (!myToken) {
        // Chuyển hướng đến trang khác
        window.location.href = '?controller=login&action=logout';
    }


    // TABLEDATAS
  $(function () {
      // Kiểm tra tham số trên URL để xác định bảng nào sẽ được hiển thị
      var params = new URLSearchParams(window.location.search);
      var controller = params.get('controller');
      var table = params.get('table');

      if (controller === 'dashboard') {
        if (table === 'products' ) {
            // Nếu table không được xác định hoặc table là 'products', chạy DataTable #example1
            $('#tableProduct').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ajax": {
                    url: 'processServerSide/server_processing_products.php', // Thay đổi đường dẫn nếu cần
                    type: 'GET', // hoặc 'GET', phụ thuộc vào yêu cầu của bạn
                    // data: function (d) {
                    //     // Thêm dữ liệu yêu cầu nếu cần
                    // },
                    // success: function (response) {
                    //     console.log(response); // In ra giá trị trả về từ server
                    // }
                }, // Thay đổi đường dẫn nếu cần
                "processing": true,
                "serverSide": true,
                 "language": {
                    // "emptyTable": "Hello",
                     "zeroRecords": "There are no products, please add a new one"
                }
            });
         
            
        };
        if (table === 'trash' ) {
            // Nếu table không được xác định hoặc table là 'products', chạy DataTable #example1
            $('#tableTrash').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ajax": {
                    url: 'processServerSide/server_processing_trash.php', // Thay đổi đường dẫn nếu cần
                    type: 'GET', // hoặc 'GET', phụ thuộc vào yêu cầu của bạn
                }, 
                "processing": true,
                "serverSide": true,
                 "language": {
                    // "emptyTable": "Hello",
                     "zeroRecords": "Empty Trash return <a href='?controller=dashboard&table=products'>here</a>"
                }
            });
        };

        if (table === 'customers' ) {
          $('#tableCustomer').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "ajax": {
                  url: 'processServerSide/server_processing_customers.php', 
                
              }, 
              "processing": true,
              "serverSide": true,
              
          });
        };

        if (table === 'orders' ) {
          $('#tableOrder').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "ajax": {
                  url: 'processServerSide/server_processing_orders.php', 
                  type: 'GET', // hoặc 'GET', phụ thuộc vào yêu cầu của bạn
                  
              }, 
              "processing": true,
              "serverSide": true,
              
          });
        };
        if (table === 'orderDetail' ) {
          $('#tableOrderDetail').DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "ajax": {
                  url: 'processServerSide/server_processing_orderDetails.php', 
                  type: 'GET', // hoặc 'GET', phụ thuộc vào yêu cầu của bạn
                  
              }, 
              "processing": true,
              "serverSide": true,
              
          });
        };
      }
  });



    // LOG OUT
    document.getElementById('logoutBtn').addEventListener('click', function () {
      // Xóa dữ liệu từ localStorage
      localStorage.removeItem('token'); // Thay 'myVariable' bằng tên của biến bạn muốn xóa
      // Hoặc sử dụng localStorage.clear(); nếu bạn muốn xóa toàn bộ dữ liệu từ localStorage
      window.location.href = '?controller=login&action=logout';
    });

    $(document).ready(function() {
        $('body').on('click', '.edit-product', function() {
          var rowData = $(this).closest('tr');
          var data = $('#tableProduct').DataTable().row(rowData).data();
          if (data) {
            console.log(data);
            // Dữ liệu đã được lấy thành công, bạn có thể làm gì đó với nó ở đây
            $('#idProduct').val(data[0]); 
            $('#productName').val(data[1]); 
            $('#divImg').html(data[2]);
            // $('#selectCategory').val(data[4]);
            var priceWithoutSymbol = data[3].replace(/[₫,]/g, '');
            $('#productPrice').val( parseInt(priceWithoutSymbol));

            var select = document.getElementById("chooseCategory"); // Lấy thẻ select
            // console.log(select.options.length);
            for (var i = 0; i < select.options.length; i++) {
              var optionText = select.options[i].innerText; // hoặc options[i].textContent;
              // console.log(optionText);
              if(optionText===data[4]){
                select.options[i].selected = true;
                break;
              }
            }
           
          } else {
            // Không có dữ liệu trong dòng được click
            console.log("No data available for the clicked row.");
          }
            $("#modal-edit-product").modal();
        });
    });

    

</script>
</body>
</html>
