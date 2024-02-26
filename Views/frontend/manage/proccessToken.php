<?php
if(!isset($token)){
    echo "<script>location.href = '?controller=login';</script>";
}else{
    echo "<script>";
    echo "localStorage.setItem('token', '" . $token . "');";
    echo "</script>";
    echo "<script>location.href = '?controller=dashboard';</script>";
}
?>
