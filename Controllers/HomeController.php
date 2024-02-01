<?php



class HomeController extends BaseController {

        private $homeModel;
        

        public function __construct(){
            $this->loadModel('HomeModel');
            $this->homeModel = new HomeModel;
        }

        public function index(){
            // die(__METHOD__);
            $selectColumn=['id','name','image','price'];
            $order=['column'=>'id','order'=>'desc'];
            $product =  $this->homeModel->getAllProducts($selectColumn,$order);
            return $this->loadView('frontend.home.index',['products'=>$product]);// trỏ tới view  required
        }


        //Customers Login .....
        // public function auth(){
        //      if(isset($_POST['submit'])){
        //         $eCustomer= $_POST["eCustomer"];
        //         $pCustomer= $_POST["pCustomer"];
        //         $result = $this->homeModel->getpCustomer($eCustomer);
        //         if( mysqli_num_rows($result)){
        //             while ($row = mysqli_fetch_array($result)) {
        //                 $id=$row["id"];
        //                 $eCustomer=$row["email"];
        //                 $pCustomer=$row["password"];
        //             }
        //         }
        //      }
        // }
}

?>