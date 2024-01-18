<?php
class ProductModel extends BaseModel{
    const TABLE = 'products';
    public function getAllProducts($select=['*'],$orderBy=[],$limit=20){
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
        return $this->findByCategoryId(self::TABLE,$category_id);
        
    }
    public function findProductById($id){
        return $this->findById(self::TABLE,$id);
        
    }

}

?>