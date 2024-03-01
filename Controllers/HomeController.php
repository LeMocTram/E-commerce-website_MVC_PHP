<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

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

        public function error(){
            
            $this->loadView('frontend.home.error');
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
                    $idCustomer=$id;
                    $cookieCustomerFromSV="cookieCustomerFromSV";
                    echo "<script>";
                    echo "localStorage.setItem('idCustomer', '" . $idCustomer . "');";
                    echo "localStorage.setItem('cookieCustomerFromSV', '" . $cookieCustomerFromSV . "');";
                    echo "</script>";
                    echo "<script>location.href = '?controller=home';</script>";
                    // echo "<script>location.href = '?controller=home';</script>";
                    // die;
                    // exit(); // Dừng thực thi sau khi chuyển hướng
                } else {
                    $passwordWrong = "passwordWrong";
                    echo "<script>";
                    echo "localStorage.setItem('passwordWrong', '" . $passwordWrong . "');";
                    echo "</script>";
                    echo "<script>location.href = '?controller=home';</script>";
                    exit(); // Dừng thực thi sau khi chuyển hướng
                }
            } else {
                $accNoExist="noExist";
                echo "<script>";
                echo "localStorage.setItem('accNoExist', '" . $accNoExist . "');";
                echo "</script>";
                echo "<script>location.href = '?controller=home';</script>";
                exit(); // Dừng thực thi sau khi chuyển hướng
            }
        }
        // Customers Register
        public function register (){
            if(empty($_POST['registered-name']) || empty($_POST['registered-email']) || empty($_POST['registered-password'])) {
                // echo "Vui lòng điền đầy đủ thông tin đăng nhập.";
                return; // Kết thúc hàm nếu không đủ thông tin
            } else {
                $nCustomer = $_POST['registered-name'];
                $eCustomer = $_POST['registered-email'];
                $pCustomer = hash('md5',$_POST['registered-password']);
                $result = $this->homeModel->registerAccount($eCustomer,$pCustomer,$nCustomer);

                if ($result===false) {
                    $emailExist="emailExist";
                    echo "<script>";
                    echo "localStorage.setItem('emailExist', '" . $emailExist . "');";
                    echo "</script>";
                    echo "<script>location.href = '?controller=home';</script>";
                    exit();
                } else {
                    $createSuccess="createSuccess";
                    echo "<script>";
                    echo "localStorage.setItem('createSuccess', '" . $createSuccess . "');";
                    echo "</script>";
                    echo "<script>location.href = '?controller=home';</script>";
                    // exit();
                    echo "<script>location.href = '?controller=home';</script>";
                    // exit();  
                }
            }

        }

        public function checkProductExsit($cartData) {
            foreach ($cartData as $item) {
                $id = $item['id'];
                $result = $this->productModel->checkProductExit($id);
                if ($result['deleted'] == null || $result['deleted'] == '1') {
                    return $id;
                }
            }
            return null;
        }
        public function order(){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $arr = array($_POST["address"],$_POST["ward"],$_POST["districts"],$_POST["provinces"]);
                $arrAddress = implode(", ", $arr);
                $cartData = json_decode($_POST["cartData"], true);
                $deleted = $this->checkProductExsit($cartData);
                // var_dump($deleted);
                // die;
                if($deleted !== null){
                    echo "<script>";
                    echo "localStorage.setItem('idProductNotExsit', '" . $deleted . "');";
                    echo "</script>";
                    echo "<script>location.href = '?controller=home&action=error';</script>";
                    die;
                }else{
                    // die;
                    if($_POST["idCustomer"]===""){
                        $data = [
                            'fullname'=> $_POST["fullname"],
                            'phone'=> $_POST["phone"],
                            'email'=> $_POST["email"],
                            'address'=> $arrAddress,
                            'total'=> intval(str_replace([',', '₫'], '', $_POST["totalBill"])),
                            'note'=> $_POST["note"],
                            'method'=> $_POST["method"]
                        ];
                    } else {
                        $data = [
                            'customer_id'=> $_POST["idCustomer"],
                            'fullname'=> $_POST["fullname"],
                            'phone'=> $_POST["phone"],
                            'email'=> $_POST["email"],
                            'address'=> $arrAddress,
                            'total'=> $_POST["totalBill"],
                            'note'=> $_POST["note"],
                            'method'=> $_POST["method"]
                    ];
                    }
                    
                    $result = $this->orderModel->store($data);

                    if(isset($result)&& is_int($result)){
                        $this->orderDetailModel->store($result,$cartData);
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = '19522373@gm.uit.edu.vn';                     //SMTP username
                            $mail->Password   = 'mhcs dprj woty essi';                               //SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                            //Recipients
                            $mail->setFrom('19522373@gm.uit.edu.vn', 'ClothesForBoy');
                            $mail->addAddress($_POST["email"], $_POST["fullname"]);     //Add a recipient
                            $mail->addCC('19522373@gm.uit.edu.vn');
                    
                            //Content
                            $mail->CharSet = 'UTF-8'; // Thiết lập charset là UTF-8 để hỗ trợ ký tự Unicode
                            $mail->isHTML(true); // Thiết lập định dạng email là HTML
                            $mail->Subject = 'Xác nhận đặt hàng thành công';

                            // Tạo nội dung HTML cho email
                            $body = '<html><body>';

                            // Thêm tiêu đề cho email
                            $body .= '<h2>Xác nhận đặt hàng thành công</h2>';

                            // Thêm thông điệp cho email
                            $body .= '<p>Chào ' . $_POST["fullname"] . ',</p>';
                            $body .= '<p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Chúng tôi xác nhận rằng đơn hàng của bạn đã được nhận và đang được xử lý. Dưới đây là chi tiết đơn hàng của bạn:</p>';

                            // Thêm thông tin sản phẩm từ mảng $cartData vào email
                            $body .= '<table border="1" cellspacing="0" cellpadding="10">';
                            $body .= '<thead><tr><th>Hình ảnh</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th></tr></thead>';
                            $body .= '<tbody>';
                            foreach ($cartData as $item) {
                                $body .= '<tr>';
                                $body .= '<td><img src="' . $item['image'] . '" alt="' . $item['name'] . '" style="max-width: 100px;"></td>';
                                $body .= '<td>' . $item['name'] . '</td>';
                                $body .= '<td>' . $item['price'] . ' VNĐ</td>';
                                $body .= '<td>' . $item['quantity'] . '</td>';
                                $body .= '</tr>';
                            }
                            $body .= '</tbody>';
                            $body .= '</table>';

                            // Thêm thông điệp kết thúc email
                            $body .= '<p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi. Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email 19522373@gm.uit.edu.vn hoặc số điện thoại 0983962553.</p>';
                            $body .= '<p>Trân trọng,<br>[Tên cửa hàng]</p>';
                            $body .= '</body></html>';

                            // Gán nội dung email đã tạo vào phần thân của email
                            $mail->Body = $body;

                            $mail->send();
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                        $sendOrder="success";
                        echo "<script>";
                        echo "localStorage.setItem('sendOrder', '" . $sendOrder . "');";
                        echo "</script>";
                        echo "<script>location.href = '?controller=home';</script>";
                    } else {
                        echo "Lưu thất bại";
                    }
                }
            }
        }
}
?>
