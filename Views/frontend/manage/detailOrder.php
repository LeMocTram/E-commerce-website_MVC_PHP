<script>
    var myToken = localStorage.getItem('token');

// Nếu không có biến trong localStorage
if (!myToken) {
    // Chuyển hướng đến trang khác
    window.location.href = '?controller=login&action=logout';
}
</script>
 <h1 style="text-align: center; margin-bottom:100px; ">Detail order</h1>

<table>
    <thead>
        <tr>
            <th>OrderID</th>
            <th>Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
           
        </tr>
    </thead>
    <tbody id="productList">
        <?php
        if(isset($detailOrders)){
            foreach($detailOrders as $detailOrder){
        ?>
        <tr>
            <td><?php echo $detailOrder["order_id"]?></td>
            <td><?php echo $detailOrder["name"]?></td>
            <td><?php echo number_format((int)$detailOrder["unit_price"]) ."₫" ?></td>
            <td><?php echo $detailOrder["quantity"]?></td>
            
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