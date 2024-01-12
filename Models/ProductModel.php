<h1>ProductModel</h1>
<?php
class ProductModel{
    const TABLE = 'products';

    public function getAll(){
        return __METHOD__;
    }
    
    public function findById($id){
        return [
            ['id'=>'1',
            'name'=>'iphone 15'],
            ['id'=>'2',
            'name'=>'iphone 15'],
            ['id'=>'3',
            'name'=>'iphone 15'],
            ['id'=>'4',
            'name'=>'iphone 15'],
            ['id'=>'5',
            'name'=>'iphone 15'],
            
        ];
    }
    public function delete(){
        return  __METHOD__;
    }



}

?>