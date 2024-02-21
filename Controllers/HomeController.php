<?php
class HomeController extends BaseController {

        private $homeModel;
        private $productModel;
        private $orderModel;
        private $orderDetailModel;

        public function __construct(){
            $this->loadModel('HomeModel');
            $this->homeModel = new HomeModel;
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            $this->loadModel('OrderModel');
            $this->orderModel = new OrderModel;
            $this->loadModel('OrderDetailModel');
            $this->orderDetailModel = new OrderDetailModel;
        }

        public function index(){
            // die(__METHOD__);
            $selectColumn=['id','name','image','price'];
            $order=['column'=>'id','order'=>'desc'];
            $product =  $this->homeModel->getAllProducts($selectColumn,$order);
            return $this->loadView('frontend.home.index',['products'=>$product]);// trỏ tới view  required
        }

        public function show(){
            if(isset($_GET['category_id'])){
                $product= $this->productModel->findProductByCategoryId($_GET['category_id']);
                return $this->loadView('frontend.home.index',['products'=>$product]);
            }
        }

        public function detail(){
            if(isset($_GET['id'])){
                $product = $this->productModel->findProductById($_GET['id']);
                return $this->loadView('frontend.home.index',['productDetail'=>$product]);
            }
        }

        public function cart(){
            $this->loadView('frontend.home.index');
        }

    


        // Customers Login .....
        public function auth(){
            if(empty($_POST['eCustomer']) || empty($_POST['pCustomer'])) {
                echo "Vui lòng điền đầy đủ thông tin đăng nhập.";
                return; // Kết thúc hàm nếu không đủ thông tin
            }
                $eCustomerInput = $_POST["eCustomer"];
                $pCustomerInput = $_POST["pCustomer"];
                $result = $this->homeModel->getpCustomer($eCustomerInput);
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $id = $row["id"];
                    $eCustomer = $row["email"];
                    $pCustomer = $row["password"];
                    
                    // Kiểm tra mật khẩu
                    if((hash('md5',$pCustomerInput)===$pCustomer)){
                            setcookie('idCustomer', $id, time() + 3600, "/");
                            setcookie("cookieCustomerFromSV", $pCustomer, time() + 3600, "/");
                            header('Location: ?controller=home');
                    }else{
                            setcookie('passwordWrong', 'false', time() + 3600, "/");
                            header('Location: ?controller=home');
                    }
                } else {
                        setcookie('noExist', 'false', time() + 3600, "/");
                        header('Location: ?controller=home');
                }
        }
        // Customers Register
        public function register (){
            if(empty($_POST['registered-name']) || empty($_POST['registered-email']) || empty($_POST['registered-password'])) {
                // echo "Vui lòng điền đầy đủ thông tin đăng nhập.";
                return; // Kết thúc hàm nếu không đủ thông tin
            }else{
                $nCustomer = $_POST['registered-name'];
                $eCustomer = $_POST['registered-email'];
                $pCustomer = hash('md5',$_POST['registered-password']);
                $result = $this->homeModel->registerAccount($eCustomer,$pCustomer,$nCustomer);

                // var_dump($result);
                 if ($result===false) {
                        setcookie('emailExist', 'true', time() + 3600, "/");
                        header('Location: ?controller=home');
                    } else {
                        setcookie('createSuccess', 'true', time() + 3600, "/");
                        header('Location: ?controller=home');
                    }
                }

        }


        public function order(){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                // $cartData = $_POST["cartData"];
                $arr = array($_POST["address"],$_POST["ward"],$_POST["districts"],$_POST["provinces"]);
                $arrAddress = implode(", ", $arr);
                // echo gettype($cartData);
                // echo '<pre>';
                // print_r($cartData);
                // var_dump($cartData);
                $cartData = json_decode($_POST["cartData"], true);
                if($_POST["idCustomer"]===""){
                    $data = [
                        // 'customer_id'=> $_POST["idCustomer"],
                        'fullname'=> $_POST["fullname"],
                        'phone'=> $_POST["phone"],
                        'email'=> $_POST["email"],
                        'address'=> $arrAddress,
                        'total'=> $_POST["totalBill"],
                        'note'=> $_POST["note"],
                        'method'=> $_POST["method"]
                    ];
                }else{
                    $data = [
                    'customer_id'=> $_POST["idCustomer"],
                    'fullname'=> $_POST["fullname"],
                    'phone'=> $_POST["phone"],
                    'email'=> $_POST["email"],
                    'address'=> $_POST["address"],
                    'total'=> $_POST["totalBill"]
                ];
                }
                
                $result = $this->orderModel->store($data);

                if(isset($result)&& is_int($result)){
                    $this->orderDetailModel->store($result,$cartData);
                    
                    setcookie('sendOrder', 'true', time() + 3600, "/");
                    header('Location: ?controller=home');
                }else{
                    echo "Luu that bai";
                }
                die;
            }
        }

}

?>