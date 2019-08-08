<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "mawingun_mpesa";
    
    public static $conn;
    
    function __construct() {
        self::$conn = $this->connectDB();
        if(!empty(self::$conn)) {
            $this->selectDB();
        }
    }
    
    function connectDB() {
        $connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $connection;
    }
    
    function selectDB() {
        mysqli_select_db(self::$conn, $this->database);
    }
    
    function runQuery($query) {
        $result = mysqli_query(self::$conn, $query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }
    
    function numRows($query) {
        $result  = mysqli_query(self::$conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>