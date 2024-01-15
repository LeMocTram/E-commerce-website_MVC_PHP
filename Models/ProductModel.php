<h1>ProductModel</h1>
<?php
class ProductModel extends BaseModel{
    const TABLE = 'products';
    public function getAllProducts($select=['*'],$orderBy=[],$limit=15){
       return $this->getAllData(self::TABLE,$select,$orderBy,$limit);
    }

    public function storeProduct($data){
        return $this->create(self::TABLE,$data);
    }
}

?>