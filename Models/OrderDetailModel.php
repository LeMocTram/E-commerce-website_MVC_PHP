<?php
class OrderDetailModel extends BaseModel{
    
    const TABLE = 'order_details';

    public function store($result,$data){
        return $this->storeOrderDetail(self::TABLE,$result,$data);
    }
}

?>