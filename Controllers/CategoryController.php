<?php
class CategoryController extends BaseController {
    
    public function index(){
        $pageTilte= 'Hello Category****';
        $categories=[
            [
                'id'=>1,
                'name'=>'Laptop',
            ],
            [
                'id'=>2,
                'name'=>'desktop',
            ],
            [
                'id'=>3,
                'name'=>'tablet',
            ],
            [
                'id'=>4,
                'name'=>'phone',
            ]
        ];

        return $this->loadview('frontend.categories.index',[
            "pageTilte"=> $pageTilte,
            "categories"=> $categories
        ]);// trỏ tới view  required
        // return include './Views/frontend/products/index.php';
    }

    public function show(){
        echo __METHOD__;
    }
}



?>
