<?php



class HomeController extends BaseController {

        private $homeModel;
        

        public function __construct(){
            $this->loadModel('HomeModel');
            $this->homeModel = new HomeModel;
        }

        public function index(){
            $selectColumn=['id','name','image','price'];
            $order=['column'=>'id','order'=>'desc'];
            $product =  $this->homeModel->getAllProducts($selectColumn,$order);
            return $this->loadView('frontend.home.index',['products'=>$product]);// trỏ tới view  required
    
        }
}

?>