
<?php
class OrderModel extends BaseModel{
    
    const TABLE = 'orders';

    public function store($data){
        return $this->storeOrder(self::TABLE,$data);
    }

    public function getOrders($select=['*'],$orderBy=[],$limit=20){
        return $this->getAllData(self::TABLE,$select,$orderBy,$limit);
    }
}

?>