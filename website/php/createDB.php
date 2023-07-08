<?php 
class createDB{
    public $serverName ; 
    public $username ; 
    public $password ; 
    public $dbname ; 
    public $tablename ; 
    public  $con ;

    //class constructor 
    public function __construct(
        $dbname = "Newdb" , 
        $tablename = "product", 
        $servername = "localhost" , 
        $username = "root" , 
        $password = "" 
        ){
            $this->dbname = $dbname ; 
            $this->tablename = $tablename;  
            $this->serverName = $servername ; 
            $this->username = $username; 
            $this->password = $password ; 

            $this->con = mysqli_connect($servername , $username , $password) ; 
            if(!$this->con) {
                echo "falid" ; 
            }else {
                }
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname " ;
            if(mysqli_query($this->con , $sql)){
                $this->con = mysqli_connect($servername , $username , $password , $dbname) ; 

                $sql = "CREATE TABLE IF NOT EXISTS `$tablename` (
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                    product_name VARCHAR(25) NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR(100)
                )";
                if (!mysqli_query($this->con, $sql)) {
                    echo "Error creating table: " . mysqli_error($this->con);
                }
                
            
            }
        }
        public function getData() {
            $sql = "select * from $this->tablename" ; 
            $result = mysqli_query($this->con , $sql) ; 
            if(mysqli_num_rows($result) > 0 ){
                return $result ; 
            }
        }
}
?> 