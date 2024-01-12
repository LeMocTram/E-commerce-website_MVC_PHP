
<?php

abstract class Database{

    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE = "webphp";
    private $connect;
    
    abstract function connectToDatabase(){
       

        // Create connection
        $this->connect = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);

        // Check connection
        if ($this->connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }

        return $this->connect;
    }
}
   
?>



