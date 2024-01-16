<?php
class ProductModel extends BaseModel{
    const TABLE = 'products';
    public function getAllProducts($select=['*'],$orderBy=[],$limit=15){
       return $this->getAllData(self::TABLE,$select,$orderBy,$limit);
    }

    public function store($data){
        return $this->create(self::TABLE,$data);
    }

    public function updateData($id, $data){
        $this->update(self::TABLE,$id,$data);
    }

    public function deleteProduct($id){
        $this->delete(self::TABLE,$id);
        
    }


    public function findProductByCategoryId($category_id){
        $this->findByCategoryId(self::TABLE,$category_id);
        
    }

}

?>