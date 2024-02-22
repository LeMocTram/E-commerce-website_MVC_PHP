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

    public function registerAccount($eCustomer,$pCustomer,$nCustomer){
        
       

        // Kiểm tra xem địa chỉ email đã tồn tại hay chưa
        $existingCustomer = $this->checkExistingEmail(self::TABLE_CUSTOMERS, $eCustomer);
        // var_dump($existingCustomer);
        if ($existingCustomer===NULL) {
            return $this->createAccount(self::TABLE_CUSTOMERS, $eCustomer, $pCustomer, $nCustomer);
        } else {
            return false;
        }
    }


    public function findProductByCategoryId($category_id){
        return $this->findByCategoryId(self::TABLE,$category_id);
        
    }
    public function findProductById($id){
        return $this->findById(self::TABLE,$id);
        
    }

}

?>