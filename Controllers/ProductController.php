<?php

//extends kế thừa lớp cha BaseController. để xử dụng phương thức lớp cha dùng $this->tên phương thức
class ProductController extends BaseController {

    private $productModel;


    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

    }
    
    public function index(){
        $selectColumn=['id','name','image','price','code'];
        $order=['column'=>'id','order'=>'asc'];
        $product =  $this->productModel->getAllProducts($selectColumn,$order);

        return $this->loadView('frontend.products.index',['products'=>$product]);// trỏ tới view  required
        // return include './Views/frontend/products/index.php';
    }

    public function storeProduct(){
        $data = [
            'name'=> 'ABC',
            'image'=>NULL,
            'price'=>'1500000',
            'code'=>'4aa4asdad'
        ];
        $this->productModel->storeProduct($data);
    }

    // public function show(){
    //     $product= $this->productModel->findById(1);
    //     return $this->loadView('frontend.products.show',['product'=>$product]);// trỏ tới view  required
        
    // }
}



?>
