<?php
if(!isset($token)){
 header('Location: ?controller=login');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Post Form</title>
</head>
<body>

<!-- Form ẩn -->
<form id="hiddenForm" action="?controller=login&action=validateToken" method="post" style="display: none;">
    <input type="text" name="token" value="<?php echo $token;?>">
    <input type="password" name="password" value="example_password">
    <button type="submit">Submit</button>
</form>

<!-- JavaScript để tự động submit form khi trang được load -->
<script>
    window.onload = function() {
        document.getElementById('hiddenForm').submit();
    };
</script>

</body>
</html>

