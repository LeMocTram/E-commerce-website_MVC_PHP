
<?php
class CustomerModel extends BaseModel{
    
    const TABLE = 'customers';


    public function getAllCustomers($select=['*'],$orderBy=[],$limit=20){
        return $this->getAllData(self::TABLE,$select,$orderBy,$limit);
    }
}

?>