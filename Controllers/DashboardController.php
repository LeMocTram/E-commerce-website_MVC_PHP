<?php



class DashboardController extends BaseController {


        private $productModel;
        public function __construct(){
                $this->loadModel('ProductModel');
                $this->productModel = new ProductModel;

            }

        public function index(){
            $selectColumn=['id','name','image','price','category_id'];
            $order=['column'=>'id','order'=>'asc'];
            $product =  $this->productModel->getAllProducts($selectColumn,$order);
            return $this->loadView('frontend.manage.dashboard',['products'=>$product]);
        }
       

        //Add new products
        
        public function add(){
            $data = [
            'name'=> $_POST["name"],
            'image'=>$_POST["image"],
            'price'=>$_POST["price"],
            'category_id'=> $_POST["category_id"]
        ];
            $this->productModel->store($data);
            header('Location: ?controller=dashboard');

        }
        public function delete(){
            $id=$_GET['id'];
            $this->productModel->deleteProduct($id);
             return $this->loadView('frontend.manage.edit',['products'=>$product]);
            header('Location: ?controller=dashboard');


        }
        
        public function edit(){
            $id=$_GET['id'];
           $product= $this->productModel->findProductById($id);
            return $this->loadView('frontend.manage.edit',['products'=>$product]);

        }

        public function update(){
            $id=$_GET['id'];
             $data = [
            'name'=> $_POST["name"],
            'image'=>$_POST["image"],
            'price'=>$_POST["price"],
            'category_id'=> $_POST["category_id"]
             ];
            $this->productModel->updateData($id,$data);
            header('Location: ?controller=dashboard');
            
        }


}

?>