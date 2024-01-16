<?php



class HomeController extends BaseController {

        public function index(){
            return $this->loadView('frontend.home.index');// trỏ tới view  required
    
        }


}

?>