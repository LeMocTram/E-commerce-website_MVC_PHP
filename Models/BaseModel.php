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
            die($sql);
        }
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

        echo $newValues= implode(",",$values);
        echo '<br>';
        $sql = "INSERT INTO ${table} (${columns}) VALUES (${newValues})" ;
        echo $sql;
    //    if ($connect->query($sql) === TRUE) {
    //         echo "New record created successfully";
    //     } else {
    //         echo "Error: " . $sql ;
    //     }



    }
    // update data
    public function update(){

    }
    //Delete data
    public function delete(){

    }

    private function _query($sql){
       return  mysqli_query($this->connect,$sql);
    }




}

?>