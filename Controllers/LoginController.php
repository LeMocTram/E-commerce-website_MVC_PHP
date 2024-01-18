 <?php

class LoginController extends BaseController{

        private $loginModel;

        public function __construct(){
            $this->loadModel('LoginModel');
            $this->loginModel = new LoginModel;

        }

        public function index(){
            // echo __METHOD__;
           
            return $this->loadView('frontend.manage.login');// trỏ tới view  required
        }

        public function login(){
            $result_mess=false;
            if(isset($_POST['submit'])){
                $username= $_POST["username"];
                $password_input=$_POST["password"];
                if(empty($_POST["username"])||empty($_POST["password"])){
                     $this->loadView('frontend.manage.login',["result"=>$result_mess]);
                }
                $result = $this->loginModel->login($username);
                if( mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_array($result)) {
                        $id=$row["id"];
                        $username=$row["username"];
                        $password=$row["password"];
                    }
                    if(hash('md5',$password_input===$password)){
                            // $_SESSION["id"]=$id;
                            // setcookie("id","username", time()+3600, "/",0);
                            setcookie("id", $password, time() + 3600, "/"); 
                            header('Location: ?controller=dashboard');
                            // $this->loadView('frontend.manage.dashboard',["result"=>$result_mess=true]);
                    }else{
                            $this->loadView('frontend.manage.login',["result"=>$result_mess]);
                    }

                }
            }
        }
          public function logout(){
            // cookie or session
            // unset($_SESSION['id']);
            // session_destroy();
            setcookie('id', "",time()-3600,'/');
            $this->loadView('frontend.manage.login',[]);

        }


}

?>