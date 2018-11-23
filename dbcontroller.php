<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "sesame";
	private $database = "magnificent_mushroom";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {  
            
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset)) {
			return $resultset;
                } else {  
                    throw new Exception("query: $query failed!");
                    return array();
                }
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>
