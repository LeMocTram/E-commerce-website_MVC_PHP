<script>
    var myToken = localStorage.getItem('token');

// Nếu không có biến trong localStorage
if (!myToken) {
    // Chuyển hướng đến trang khác
    window.location.href = '?controller=login&action=logout';
}

</script>

 <h1 style="text-align: center; margin-bottom:100px;">MANAGE ORDERS</h1>


 <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Customers Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Payment methods</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody id="productList">
                <?php
                if(isset($orders)){
                    foreach($orders as $order){
                ?>
                <tr>
                    <td><?php echo $order["id"]?></td>
                    <td><?php echo $order["created_at"]?></td>
                    <td><?php echo  number_format((int)$order["total"]) ."₫"?></td>
                    <td><?php echo $order["fullname"]?></td>
                    <td><?php echo $order["address"]?></td>
                    <td><?php echo $order["email"]?></td>
                    <td><?php echo $order["phone"]?></td>
                    <td><?php echo $order["method"]?></td>
                    <td>
                        <a href="?controller=dashboard&action=detailOrder&id=<?php echo $order["id"]?>">
                            <i class="fa-solid fa-circle-info"></i> 
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


