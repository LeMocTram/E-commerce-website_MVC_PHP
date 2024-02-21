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
            $base64='data:image/png;base64,'.base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
            $data = [
            'name'=> $_POST["name"],
            'image'=>$base64,
            'price'=>$_POST["price"],
            'category_id'=> $_POST["category_id"]
        ];
            $this->productModel->store($data);
            header('Location: ?controller=dashboard');

        }
        public function delete(){
            $id=$_GET['id'];
            $this->productModel->deleteProduct($id);
            header('Location: ?controller=dashboard');
        }
        public function edit(){
            $id=$_GET['id'];
           $product= $this->productModel->findProductById($id);
            return $this->loadView('frontend.manage.edit',['products'=>$product]);

        }

        public function update(){
            $id=$_GET['id'];
            if($_FILES["image"]["tmp_name"]===""){
                $data = [
                    'name'=> $_POST["name"],
                    'price'=>$_POST["price"],
                    'category_id'=> $_POST["category_id"]
                    ];
            }else{
                $base64='data:image/png;base64,'.base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
                $data = [
                'name'=> $_POST["name"],
                'image'=>$base64,
                'price'=>$_POST["price"],
                'category_id'=> $_POST["category_id"]
                ];

            }
         
            
                
            
      
            
            $this->productModel->updateData($id,$data);
            header('Location: ?controller=dashboard');
            
        }


}

?>