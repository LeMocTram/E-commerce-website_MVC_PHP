<?php
if(!isset($_COOKIE["id"])){
    header('Location: ?controller=login');
}
//Check valid
// if(!isset($_SESSION["id"])){
//     header('Location: ?controller=login');
// }
// if(!isset($_POST['result'])){
//     header('Location: ?controller=login');
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <header>
            <h1>Dashboard</h1>
            <a class="btn-logout" href="?controller=login&action=logout">LOGOUT <i class="material-icons">arrow_forward</i></a>
    </header>

    <div class="container">
        <h1 style="text-align: center; margin-bottom:100px;">LIST OF PRODUCTS</h1>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addModal"><i class="material-icons">&#xe145;</i>Add new product</button>

  <!-- Modal -->
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add</h4>
        </div>
        <div class="modal-body">
            <form id="productForm" method="post" action='?controller=dashboard&action=add' enctype="multipart/form-data">
                <label for="productName">Name:</label>
                <input type="text"  name="name" required=""  autocomplete="off">

                <label for="productImage">Upload Image:</label>
                <input type="file"  name="image" required=""  autocomplete="off">
                <!-- <input type="file"  name="image" required=""  autocomplete="off"> -->

                <label for="productPrice">Price:</label>
                <input type="text"  name="price" required="" autocomplete="off">

                <label for="productPrice">Category:</label><br>
                <input type="radio"  name="category_id" checked value="1">
                <label for="shirt">Shirt</label><br>
                <input type="radio"  name="category_id" value="2">
                <label for="pants">Pants</label><br>
                <input type="radio"  name="category_id" value="3">
                <label for="shoes">Shoes</label><br>
                <input type="radio"  name="category_id" value="4">
                <label for="accessory">Accessory</label><br>
                <input type="submit" value="Add Product">
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Link Image</th>
                    <th>Product Price</th>
                    <th>Product Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="productList">
                 <?php
                if(isset($products)){
                    foreach($products as $product){
                ?>
                <tr>
                    <td><?php echo $product["id"]?></td>
                    <td><?php echo $product["name"]?></td>
                    <td><?php echo '<img style="max-width:47px;max-height:62px" src="' .  $product["image"] . '" alt="Image">';?></td>
                    <td><?php echo $product["price"] . 'đ' ?></td>
                    <td><?php
                    if($product["category_id"]==1){
                        echo "shirt";
                    }elseif($product["category_id"]==2){
                        echo "pants";
                    }elseif($product["category_id"]==3){
                        echo "shoes";
                    }else{
                        echo "accessory";
                    }
                    ?>
                    <td>
                        <a style="color:black;" href="?controller=dashboard&action=edit&id=<?php echo $product["id"]?>" title="Edit" type="button">
                        <i class="material-icons">&#xe254;</i
                        ></a>
                        <a  onclick="return confirm('You want delete this product?')"style="color:red;" title="Delete" type="button" href="?controller=dashboard&action=delete&id=<?php echo $product["id"]?>"><i class="material-icons">&#xe872;</i></a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                    ?>
                   <td>You don't have any products !</td>
                    
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: relative;
            .btn-logout{
                position: absolute;
                right: 10%;
                top:50%;
                transform: translateY(-50%);
                background-color:white;
                
            }
            
        }
        span{
            height: 100%;
            position:absolute;
            top: 0;
            right: 20px;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        form {
            width: 50%;
            margin: 20px auto;
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            padding: 10px;
            margin: 5px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        button {
            background-color: #d9534f;
            color: #fff;
            padding: 8px;
            border: none;
            cursor: pointer;
        }
        a{
            text-decoration: none;
           
        }
    </style>
</html>
