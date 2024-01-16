<?php

//extends kế thừa lớp cha BaseController. để xử dụng phương thức lớp cha dùng $this->tên phương thức
class ProductController extends BaseController {

    private $productModel;


    public function __construct(){
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;

    }
    
    public function index(){
        $selectColumn=['id','name','image','price'];
        $order=['column'=>'id','order'=>'asc'];
        $product =  $this->productModel->getAllProducts($selectColumn,$order);

        return $this->loadView('frontend.products.index',['products'=>$product]);// trỏ tới view  required
        // return include './Views/frontend/products/index.php';
    }

    public function store(){
        $data = [
            'name'=> 'ABC',
            'image'=>NULL,
            'price'=>'1500000',
            'category_id'=>'1'
        ];
        $this->productModel->store($data);
    }

    public function updateData(){
        $id=$_GET['id'];
         $data = [
            'name'=> 'b',
            'image'=>NULL,
            'price'=>'a',
            'category_id'=>'4'
        ];
        $this->productModel->updateData($id,$data);
    }

    public function deleteProduct(){
        $id=$_GET['id'];
        $this->productModel->deleteProduct($id);
    }

    public function show(){
        $category_id=$_GET['category_id'];
        $products= $this->productModel->findProductByCategoryId($category_id);
        echo '<pre>';
        // var_dump($products);
        return $this->loadView('frontend.products.show',['product'=>$products]);// trỏ tới view  required
        
    }
}



?>
