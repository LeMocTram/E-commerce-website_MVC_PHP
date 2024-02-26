<script>
    var myToken = localStorage.getItem('token');

// Nếu không có biến trong localStorage
if (!myToken) {
    // Chuyển hướng đến trang khác
    window.location.href = '?controller=login&action=logout';
}
</script>
 <h1 style="text-align: center; margin-bottom:100px; ">MANAGE CUSTOMER ACCOUNTS</h1>

 <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Customers Name</th>
                   
                </tr>
            </thead>
            <tbody id="productList">
                <?php
                if(isset($customers)){
                    foreach($customers as $customer){
                ?>
                <tr>
                    <td><?php echo $customer["id"]?></td>
                    <td><?php echo $customer["email"]?></td>
                    <td><?php echo $customer["password"]?></td>
                    <td><?php echo $customer["name"]?></td>
                    
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