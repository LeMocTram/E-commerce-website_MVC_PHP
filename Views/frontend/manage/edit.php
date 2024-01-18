<?php
if(!isset($_COOKIE["id"])){
    header('Location: ?controller=login');
}
// if(!isset($_SESSION["id"])){
//     header('Location: ?controller=login');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <h1 style="text-align: center; margin-bottom:100px;margin-top:100px;">EDIT FORM</h1>

    <form id="productForm" method="post" action='?controller=dashboard&action=update&id=<?php echo $products['id'];?>'>
                <label for="productName">Name:</label>
                <input type="text"  name="name" value="<?php echo $products['name'];?>"  autocomplete="off">

                <label for="productImage">Link Image:</label>
                <input type="text"  name="image"value="<?php echo $products['image'];?>"  autocomplete="off">

                <label for="productPrice">Price:</label>
                <input type="text"  name="price" value="<?php echo $products['price'];?>" autocomplete="off">

                <label for="productPrice">Category:</label><br>
                <input type="radio"  name="category_id" checked value="1">
                <label for="shirt">Shirt</label><br>
                <input type="radio"  name="category_id" value="2">
                <label for="pants">Pants</label><br>
                <input type="radio"  name="category_id" value="3">
                <label for="shoes">Shoes</label><br>
                <input type="radio"  name="category_id" value="4">
                <label for="accessory">Accessory</label><br>
                <input type="submit" value="Update Product">
            </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
 form {
            width: 50%;
            margin: 20px auto;
        }
 input[type="text"], input[type="submit"] {
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

</style>
</html>