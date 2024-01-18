<?php

class BaseModel extends Database {

    protected $connect;

    public function __construct(){
        $this->connect = $this->connectToDatabase();
       
    }

    //read data
    public function getAllData($table,$select=['*'] ,$orderBy=[],$limit=15){
        $orderByString=implode(' ',$orderBy);
        $column= implode(',',$select);
        if($orderByString){
            $sql = "SELECT ${column} FROM ${table} ORDER BY ${orderByString} LIMIT ${limit}";
        }else{
            $sql = "SELECT ${column} FROM ${table} LIMIT ${limit}";
            // die($sql);
        }
        $query = $this->_query($sql);
        $data=[];
        //Mỗi lần lấy ra được 1 bản ghi thông qua câu lệnh mysqli_fetch_assoc($query)
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;
       
    }
    //findbyid
    public function findByCategoryId($table,$category_id){
        $sql= "SELECT * FROM ${table} WHERE category_id = ${category_id}";
        // echo $sql;
        $query = $this->_query($sql);
        $data=[];
        //Mỗi lần lấy ra được 1 bản ghi thông qua câu lệnh mysqli_fetch_assoc($query)
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }
        return $data;
    }

    public function findById($table,$id){
        $sql= "SELECT * FROM ${table} WHERE id = ${id} LIMIT 1";
        $query = $this->_query($sql);
        return  mysqli_fetch_assoc($query);
    }
    //create data
    public function create($table,$data=[]){
        
        $columns = implode(',',array_keys($data));
        $values = array_map(function($values){
	    return "'" . $values . "'";},array_values($data));

        $newValues= implode(",",$values);
        $sql = "INSERT INTO ${table} (${columns}) VALUES (${newValues})" ;
        $this->_query($sql);
            


    }
    // update data
    public function update($table,$id,$data=[]){
        $dataSets=[];
        foreach($data as $key => $val){
                array_push($dataSets, "$key= '" . $val . "'");
        }
        $newData=implode(",",$dataSets);
        $sql = "UPDATE ${table} SET ${newData} WHERE id = ${id}";
        $this->_query($sql);


    }
    //Delete data
    public function delete($table,$id){

        $sql="DELETE FROM ${table} WHERE id = ${id}";
        $this->_query($sql);

    }


    public function getPassWord($table,$username){
        $sql= "SELECT * FROM ${table} WHERE username = '${username}' ";
        $query = $this->_query($sql);
        return  $query;
    }

    private function _query($sql){
       return  mysqli_query($this->connect,$sql);
    }




}

?>