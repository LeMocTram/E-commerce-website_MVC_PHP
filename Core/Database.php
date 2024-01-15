
<?php

 class Database{

    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DB_NAME = "webphp";
    
    public function connectToDatabase(){
       
        // Create connection
        $connect = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DB_NAME);

        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        return $connect;
    }
}
   
?>



