<!-- route
Có req sẽ đc tror tới route ở đây
Route sẽ trỏ tới Controller
Controller sẽ trỏ tới Model->DB để lấy dữ liệu hiện -> View
-->

<?php
require "./Core/Database.php";
require "./Controllers/BaseController.php"; 


//Giong codeigniter
//ucfirst =>> kí tự đầu in hoa.
$controllerName=ucfirst(( strtolower($_REQUEST['controller'] )?? 'Welcome') . 'Controller');// xử lý lỗi trên linux.
$actionName= $_REQUEST['action']?? 'index';
require "./Controllers/${controllerName}.php";// trỏ tới file controller.
// echo $controllerName;
$controllerObject= new $controllerName;// Bằng obj (class cua Controller)
// var_dump($controllerObject);
$controllerObject->$actionName();//dung class truy capj vao ham o controller do







?>