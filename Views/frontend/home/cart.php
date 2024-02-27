
<div class="container">
    <ul class="dir-cart">
    <li class="dir-name"><a href="#">ClothesForBoy</a></li>
    <li class="dir-name">/</li>
    <li class="dir-name"><a href="#">Đơn đặt hàng</a></li>
</ul>
</div>
<form method="post" action="?controller=home&action=order">
    <div class="container container-detail-card">
        <div class="col-lg-6 col-md-12 col-sm-12" id="cart-col-left">
            <div class="detail-infor-contact">
                <legend>Thông tin liên hệ giao hàng</legend>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Họ và tên *</label>
                    <div class="col-lg-8"> 
                        <input type="text" name="fullname" id="fullname" class="form-control field" value="" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Email *</label>
                    <div class="col-lg-8"> <input type="email" class="form-control field" name="email" id="email" value="" required> </div>

                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Số điện thoại *</label>
                    <div class="col-lg-8"> <input type="text" class="form-control field" data-field="phone" data-field-valid="phone" id="phone" name="phone" value="" required> <span data-message-for="phone"> </span> </div>
                </div>
                <legend>Địa chỉ giao hàng</legend>
                
                <div class="form-group"> 
                    <label class="col-lg-4 control-label">Tỉnh thành*</label> 
                    <div class="col-lg-8"> <input type="text" class="form-control field" name="provinces" id="provinces" value="" required> </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-4 control-label">Quận huyện *</label> 
                    <div class="col-lg-8"> <input type="text" class="form-control field" name="districts" id="districts" value="" required> </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-4 control-label">Tên phường/Xã *</label> 
                    <div class="col-lg-8"> <input type="text" class="form-control field" name="ward" id="ward" value="" required> </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-4 control-label">Số nhà, tên đường *</label> 
                    <div class="col-lg-8"> <input type="text" class="form-control field" name="address" id="address" value="" required> </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-4 control-label">Ghi chú</label> 
                    <div class="col-lg-8"> <textarea class="form-control field" name="note" rows="5" style="height:50px;"></textarea> </div> 
                </div>
                <legend>Hình thức thanh toán</legend>
                <div class="col-md-8 payment-methods">
                    <div class="cod-method">
                        <input type="radio" id="cod" name="method" value="cod" checked>
                        <label for="cod">COD</label>
                    </div>
                    <div class="cash-method">
                        <input type="radio" id="cash" name="method" value="cash">
                        <label for="cash">Tiền mặt</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12" id="cart-col-right">
            <div class="detail-infor-cart">
                <legend>Giỏ hàng của bạn</legend>
                <table class="table" style="background:#FFF; font-size:12px;">
                <thead>
                    <tr>
                        <th>Hình</th>
                        <th>Thông tin sản phẩm</th>
                        <th style="width:40px;">SL</th>
                        <th style="width:70px;">Đơn giá</th>
                        <th style="width:70px;">Tổng</th>
                        <!-- <th style="width:50px;">Xóa</th> -->
                    </tr>
                </thead>
                <tbody id="cartBody">
                <!-- Dữ liệu từ localStorage sẽ được render ở đây -->
                </tbody>

                </table>
                <legend style="margin-bottom: 0px;">Tổng:</legend>
                <div style="border-bottom: 1px solid #ccc; margin: 0;" class="row"> 
                    <div class="col-md-9 col-sm-9 col-xs-9" style="padding: 5px;"> Số tiền mua sản phẩm: </div> 
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right" style="padding: 5px;"> 
                    <span id="sumTotal" vaule='' name="sumTotal"></span> </div> 
                </div>
                <strong style="display: block; margin-top: 15px;">Vận chuyển</strong>
                <table class="table" style="background:#FFF; font-size:12px;"> 
                    <tbody> 
                        <tr id="rowShipFee"> 
                            <td> Phí vận chuyển </td> 
                            <td id="shipPriceAll" price="0">Free</td> 
                        </tr> 
                    </tbody> 
                </table>
                <div class="total-payment"> 
                    <div class="col-md-9 col-sm-9 col-xs-9" style="padding: 5px;"> 
                    <strong>Tổng tiền thanh toán</strong> 
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right" style="padding: 5px;"> 
                        <span style="font-weight: bold; color: #b31f2a;" id="sumTotalBill"></span>
                    </div> 
                </div>
                <input id="totalBill" type="hidden"name="totalBill" vaule="">
                <input id="idCustomer" type="hidden"name="idCustomer" vaule="">
                <input id="cartData" type="hidden"name="cartData">
                <input id="payment" type="submit" value="Thanh toán">

            </div>
        </div>
    </div>
</form>
<script>


    var idCustomer = localStorage.getItem('idCustomer');
    console.log("idCustomer",idCustomer);
    document.getElementById('idCustomer').value = idCustomer;

    // Lấy dữ liệu từ localStorage
    var myData = JSON.parse(localStorage.getItem("cartItem"));
    console.log(myData);
    // Lấy phần tử tbody để đưa dữ liệu vào
    var tbody = document.getElementById("cartBody");
    url='?controller=home&action=detail&id='
    // Kiểm tra xem dữ liệu có tồn tại hay không
    if (myData && myData.length > 0) {
        // Lặp qua từng mục trong dữ liệu và tạo các phần tử tr cho từng mục
        var totalAll=0;
        myData.forEach(function(item) {
            var tr = document.createElement("tr");

            // Tạo phần tử td cho ảnh
            var tdImg = document.createElement("td");
            var img = document.createElement("img");
            img.src = item.image;
            img.width = "48";
            tdImg.appendChild(img);
            tr.appendChild(tdImg);

            // Tạo phần tử td cho tên sản phẩm
            var tdName = document.createElement("td");
            var strong = document.createElement("strong");
            var link = document.createElement("a");
            link.href = url+item.id;
            link.target = "_blank";
            link.textContent = item.name;
            strong.appendChild(link);
            tdName.appendChild(strong);
            tr.appendChild(tdName);

            // Tạo phần tử td cho số lượng
            var tdQuantity = document.createElement("td");
            var spanQuantity = document.createElement("span");
            spanQuantity.textContent = item.quantity;
            spanQuantity.id = "quantity_" + item.id; // Giả sử item có một id để phân biệt
            tdQuantity.appendChild(spanQuantity);
            tr.appendChild(tdQuantity);

            // Tạo phần tử td cho giá
            var tdPrice = document.createElement("td");
            tdPrice.textContent = parseInt(item.price).toLocaleString('en-US')+' ₫';
            tr.appendChild(tdPrice);

            var totalPrice = item.price * item.quantity;

            // Tạo phần tử td cho tổng
            var tdTotal = document.createElement("td");
            tdTotal.textContent = parseInt(totalPrice).toLocaleString('en-US')+' ₫';
            tr.appendChild(tdTotal);


            // Thêm phần tử tr vào tbody
            tbody.appendChild(tr);
            totalAll += totalPrice;
        });
        document.getElementById('totalBill').value = parseInt(totalAll).toLocaleString('en-US')+' ₫';
        document.getElementById('sumTotal').innerHTML = parseInt(totalAll).toLocaleString('en-US')+' ₫';
        document.getElementById('sumTotalBill').innerHTML = parseInt(totalAll).toLocaleString('en-US')+' ₫';
        
        
    } else {
        // Nếu không có dữ liệu trong localStorage, hiển thị thông báo
        var trEmpty = document.createElement("tr");
        var tdEmpty = document.createElement("td");
        tdEmpty.colSpan = 6;
        tdEmpty.textContent = "Không có sản phẩm trong giỏ hàng.";
        trEmpty.appendChild(tdEmpty);
        tbody.appendChild(trEmpty);
    }
    var cartItems = JSON.parse(localStorage.getItem("cartItem"));

    // Kiểm tra xem danh sách có dữ liệu hay không
    if (cartItems && cartItems.length > 0) {
        // Chuyển đổi danh sách sản phẩm thành chuỗi JSON
        var cartItemsJSON = JSON.stringify(cartItems);
        
        // Lấy phần tử input hidden bằng id
        var cartDataInput = document.getElementById("cartData");
        
        // Đặt giá trị cho phần tử input hidden
        cartDataInput.value = cartItemsJSON;
    }

</script>