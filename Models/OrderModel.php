
<?php
class OrderModel extends BaseModel{
    
    const TABLE = 'orders';

    public function store($data){
        return $this->storeOrder(self::TABLE,$data);
    }
}

?>