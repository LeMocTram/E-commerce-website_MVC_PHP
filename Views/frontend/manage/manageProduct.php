 <h1 style="text-align: center; margin-bottom:100px;">PRODUCT MANAGEMENT</h1>

<div class="wrapper-btn-add ">
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i> Add new product
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal add new Product-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" method="post" action='?controller=dashboard&action=add' enctype="multipart/form-data">
                    <label for="productName">Name:</label>
                    <input type="text"  name="name" required  autocomplete="off">
                    <label for="productImage">Upload Image:</label>
                    <input type="file"  name="image" required  autocomplete="off">
                    <!-- <input type="file"  name="image" required=""  autocomplete="off"> -->
                    <label for="productPrice">Price:</label>
                    <input type="number"  name="price" required autocomplete="off" min="0">
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
        </div>
        <div class="wrapper-btn-dropdown mt-2">
            <button class="btn btn-primary btn-sm" type="button" id="dropdown-btn">
               Sort by category
            </button>
            <ul class="menu-list-dropdown mt-2 col-md-4" id="menu-list-dropdown">
                <li><a class="dropdown-item" href="?controller=dashboard">All</a></li>
                <li><a class="dropdown-item" href="?controller=dashboard&category_id=1">Shirts</a></li>
                <li><a class="dropdown-item" href="?controller=dashboard&category_id=2">Pants</a></li>
                <li><a class="dropdown-item" href="?controller=dashboard&category_id=3">Shoes</a></li>
                <li><a class="dropdown-item" href="?controller=dashboard&category_id=4">Accessory</a></li>
            </ul>
        </div>

        <!-- Trigger the modal with a button -->
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
                    <td><?php echo number_format((int)$product["price"]) ."₫" ?></td>
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
                            <i class="fa-solid fa-pen-to-square"></i>   
                        </a>
                        <a  onclick="return confirm('You want delete this product?')"style="color:red;" title="Delete" type="button" href="?controller=dashboard&action=delete&id=<?php echo $product["id"]?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                    ?>
                   <td>You don't have any products!</td>
                    
                <?php
                }
                ?>
            </tbody>
        </table>