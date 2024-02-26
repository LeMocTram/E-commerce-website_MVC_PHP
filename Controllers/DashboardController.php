<?php



class DashboardController extends BaseController {


        private $productModel;
        private $orderModel;
        private $customerModel;
        private $orderDetailModel;
        public function __construct(){
                $this->loadModel('ProductModel');
                $this->productModel = new ProductModel;
                $this->loadModel('OrderModel');
                $this->orderModel = new OrderModel;
                $this->loadModel('CustomerModel');
                $this->customerModel = new CustomerModel;
                $this->loadModel('OrderDetailModel');
                $this->orderDetailModel = new OrderDetailModel;
            }

        public function index(){
            if(!isset($_GET['category_id'])){
                $selectColumn=['id','name','image','price','category_id'];
                $order=['column'=>'id','order'=>'asc'];
                $product =  $this->productModel->getAllProducts($selectColumn,$order);
            }else{
                $category_id=$_GET['category_id'];
                $product =  $this->productModel->findProductByCategoryId($category_id);
            }
            
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
            // header('Location: ');
            echo "<script>location.href = '?controller=dashboard';</script>";

        }
        public function delete(){
            $id=$_GET['id'];
            $this->productModel->deleteProduct($id);
            // header('Location: ?controller=dashboard');
            echo "<script>location.href = '?controller=dashboard';</script>";

        }
        public function edit(){
            $id=$_GET['id'];
           $product= $this->productModel->findProductById($id);
            return $this->loadView('frontend.manage.dashboard',['products'=>$product]);

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
            echo "<script>location.href = '?controller=dashboard';</script>";
            // header('Location: ?controller=dashboard');
            
        }
        public function manageOders(){
            $selectColumn=['*'];
            $sort=['column'=>'id','order'=>'desc'];
            $order =  $this->orderModel->getOrders($selectColumn,$sort);
            return $this->loadView('frontend.manage.dashboard',['orders'=>$order]);

        }
        public function manageCustomers(){
            $selectColumn=['*'];
            $sort=['column'=>'id','order'=>'asc'];
            $customer =  $this->customerModel->getAllCustomers($selectColumn,$sort);
            return $this->loadView('frontend.manage.dashboard',['customers'=>$customer]);
        }

        public function detailOrder(){
            $id = $_GET['id'];
            $detailOrder =  $this->orderDetailModel->getDetailOrders($id);
            return $this->loadView('frontend.manage.dashboard',['detailOrders'=>$detailOrder]);

        }


}

?>