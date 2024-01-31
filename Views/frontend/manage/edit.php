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

    <form id="productForm" method="post" enctype="multipart/form-data" action='?controller=dashboard&action=update&id=<?php echo $products['id'];?>'>
                <label for="productName">Name:</label>
                <input type="text"  name="name" value="<?php echo $products['name'];?>"  autocomplete="off">

                <label for="productImage">Image:</label>
                <img style="max-width:47px;max-height:62px" src="<?php echo $products['image'];?>" alt="Image">
                <label>Choose new image:</label>
                <input type="file" id="fileInput" name="image" autocomplete="off" onchange="checkFileSize()"">
                <label id="fileSizeDisplay"></label>
                <br>
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
            <p id="fileSizeDisplay"></p>
</body>
<script>
    function checkFileSize() {
        var fileInput = document.getElementById('fileInput');
        var fileSizeDisplay = document.getElementById('fileSizeDisplay');

        // Kiểm tra xem đã chọn tệp nào chưa
        if (fileInput.files.length > 0) {
            // Lấy dung lượng của tệp tin (đơn vị tính: byte)
            var fileSize = fileInput.files[0].size;

            // Kiểm tra nếu dung lượng vượt quá 4MB
            if (fileSize > 4 * 1024 * 1024) {
                // Nếu vượt quá, yêu cầu chọn lại
                fileSizeDisplay.textContent = 'Dung lượng tệp tin vượt quá 4MB. Vui lòng chọn lại.';
                // Xóa giá trị đã chọn để người dùng có thể chọn lại
                fileInput.value = '';
            } else {
                // Nếu không vượt quá, hiển thị dung lượng tệp tin
                var fileSizeFormatted = formatBytes(fileSize);
                fileSizeDisplay.textContent = 'Dung lượng tệp tin: ' + fileSizeFormatted;
            }
        } else {
            // Nếu không chọn tệp, hiển thị thông báo rỗng
            fileSizeDisplay.textContent = '';
        }
    }

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';

        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        const i = Math.floor(Math.log(bytes) / Math.log(k));

        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }
</script>


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