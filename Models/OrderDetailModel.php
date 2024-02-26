<?php
class OrderDetailModel extends BaseModel{
    
    const TABLE = 'order_details';

    public function store($result,$data){
        return $this->storeOrderDetail(self::TABLE,$result,$data);
    }

    public function getDetailOrders($id){
         return $this->findByOrderId(self::TABLE,$id);
    }
}

?>