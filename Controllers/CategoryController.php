<?php
class CategoryController extends BaseController {
    private $categoryModel;
    
    public function __construct(){
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;

    }
    
    public function index(){
        $selectColumn=['id','name'];
        $order=['column'=>'id','order'=>'asc'];
        $category= $this->categoryModel->getAllCategories($selectColumn,$order);

        return $this->loadview('frontend.categories.index',['category'=>$category]);// trỏ tới view  required
        // return include './Views/frontend/products/index.php';
    }
    public function show(){
        $id = $_GET['id'];
        $category= $this->categoryModel->findCategoryById($id);
        echo '<pre>';
        print_r($category);
        // return $this->loadview('frontend.categories.index',['category'=>$category]);// trỏ tới view  required
        // return include './Views/frontend/products/index.php';
    }
 
}



?>
