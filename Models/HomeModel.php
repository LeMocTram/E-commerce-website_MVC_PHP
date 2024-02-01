<?php
class HomeModel extends BaseModel{
    const TABLE_PRODUCTS = 'products';
    const TABLE_CUSTOMERS= 'customers';

    public function getAllProducts($select=['*'],$orderBy=[],$limit=8){
       return $this->getAllData(self::TABLE_PRODUCTS,$select,$orderBy,$limit);
    }


    public function getpCustomer($eCustomer){
         return $this->getPassWordCustomer(self::TABLE_CUSTOMERS, $eCustomer);
    }

    // public function store($data){
    //     return $this->create(self::TABLE,$data);
    // }

    // public function updateData($id, $data){
    //     $this->update(self::TABLE,$id,$data);
    // }

    // public function deleteProduct($id){
    //     $this->delete(self::TABLE,$id);
        
    // }


    public function findProductByCategoryId($category_id){
        return $this->findByCategoryId(self::TABLE,$category_id);
        
    }
    public function findProductById($id){
        return $this->findById(self::TABLE,$id);
        
    }

}

?>