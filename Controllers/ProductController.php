<?php

//extends kế thừa lớp cha BaseController. để xử dụng phương thức lớp cha dùng $this->tên phương thức
class ProductController extends BaseController {

    private $productModel;


    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

    }
    
    public function index(){
        // echo  $this->productModel->getAll();

        return $this->loadView('frontend.products.index',['pageTitle'=>'Hello from Product']);// trỏ tới view  required
        // return include './Views/frontend/products/index.php';
    }

    public function show(){
        $product= $this->productModel->findById(1);
        return $this->loadView('frontend.products.show',['product'=>$product]);// trỏ tới view  required
        
    }
}



?>
