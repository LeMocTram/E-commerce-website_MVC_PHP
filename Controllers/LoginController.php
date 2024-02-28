 
 <?php
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;



class LoginController extends BaseController{

        private $loginModel;
        private $key = "abcdef";

        public function __construct(){
            $this->loadModel('LoginModel');
            $this->loginModel = new LoginModel;
        }

        public function index(){
            // echo __METHOD__;
            // die;
            return $this->loadView('frontend.manage.login');// trỏ tới view  required
        }

        public function login(){
            // echo __METHOD__;
            // die;
            if(isset($_POST['submit'])){
                $username= $_POST["username"];
                $password_input=$_POST["password"];
                
                if(empty($_POST["username"])||empty($_POST["password"])){
                    // $adminLoginFalse="adminLoginFalse";
                    // echo "<script>";
                    // echo "localStorage.setItem('adminLoginFalse', '" . $adminLoginFalse . "');";
                    // echo "</script>";
                    // echo "<script>location.href = '?controller=login';</script>";
                      
                }
                $result = $this->loginModel->login($username);
                if( mysqli_num_rows($result)>0){
                        while ($row = mysqli_fetch_array($result)) {
                        $id=$row["id"];
                        $username=$row["username"];
                        $password=$row["password"];
                        }
                    if((hash('md5',$password_input)===$password)){
                            $token = $this->generateToken($username);
                            $this->loadView('frontend.manage.proccessToken',["token"=>$token]);
                    }else{
                            // $this->loadView('frontend.manage.login',["result"=>false]);
                            $adminLoginFalse="adminLoginFalse";
                            echo "<script>";
                            echo "localStorage.setItem('adminLoginFalse', '" . $adminLoginFalse . "');";
                            echo "</script>";
                            echo "<script>location.href = '?controller=login';</script>";
                            exit();
                    }
                }else {
                            $adminLoginFalse="adminLoginFalse";
                            echo "<script>";
                            echo "localStorage.setItem('adminLoginFalse', '" . $adminLoginFalse . "');";
                            echo "</script>";
                            echo "<script>location.href = '?controller=login';</script>";
                            exit();
                }
            }
        }


        public function validateToken(){
            $token=(string)$_POST["token"];
            try {
                // Xác minh và giải mã token
               $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
                if(!isset($decoded)){
                    // header('Location: ?controller=login');
                    echo "<script>location.href = '?controller=login';</script>";

                }else{
                    ?>
                    <form id="hiddenForm" action="?controller=dashboard" method="post" style="display: none;">
                        <input type="text" name="result" value="OK">
                        <input type="password" name="password" value="example_password">
                        <button type="submit">Submit</button>
                    </form>
                    <script>
                        window.onload = function() {
                            document.getElementById('hiddenForm').submit();
                        };
                    </script>
                    <?php
                    
                }
            } catch (\Exception $e) {
                // Token không hợp lệ
                return false;
            }
        }




          public function logout(){
            // cookie or session
            // unset($_SESSION['id']);
            // session_destroy();
            // setcookie('id', "",time()-3600,'/');

            // header('Location: ?controller=login');
            echo "<script>location.href = '?controller=login';</script>";


        }

       
        private function generateToken($user_id) {
            $expiration_time = time() + 3600; // 1 giờ
            $payload = array(
                "iss" => "your_issuer",
                "aud" => "your_audience",
                "iat" => time(),
                "exp" => $expiration_time,
                "data" => array(
                    "user_id" => $user_id
                )
            );
            return JWT::encode($payload, $this->key, 'HS256');
        }

}

?>