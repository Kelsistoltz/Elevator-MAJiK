<?php
class GuestUser{
	protected $username;
	private $password;
	protected $email;
	protected $log;
	
	public function __construct(string $username, string $password){
		$this->username = $username;
		$this->password = $password;
	}
	
	
	//Lecture 10 PHP oop 1
	public function dispUsername(){	// gets username to display??? 
		$db = new PDO('mysql:host=127.0.0.1;dbname=test','root','');
		$id = $_SESSION['nodeID'];
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$rows = $db->query('SELECT username FROM authusers WHERE nodeID = "' .$id. '"');
		foreach ($rows as $row){
			for($i=0; $i < sizeof($row)/2; $i++){
				echo "  " . $row[$i] ;
			}
			echo "<br />";
		}
		return $this->username;
	}
	
	public function dispUserID(){	// gets username to display??? 
		$db = new PDO('mysql:host=127.0.0.1;dbname=test','root','');
		$id = $_SESSION['nodeID'];
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$rows = $db->query('SELECT nodeID FROM authusers WHERE nodeID = "' .$id. '"');
		foreach ($rows as $row){
			for($i=0; $i < sizeof($row)/2; $i++){
				echo "  " . $row[$i] ;
			}
			echo "<br />";
		}
		return $this->username;
	}
	
	public function dispPassword(){	// gets username to display??? 
		$db = new PDO('mysql:host=127.0.0.1;dbname=test','root','');
		$id = $_SESSION['nodeID'];
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$rows = $db->query('SELECT password FROM authusers WHERE nodeID = "' .$id. '"');
		foreach ($rows as $row){
			for($i=0; $i < sizeof($row)/2; $i++){
				echo "  " . $row[$i] ;
			}
			echo "<br />";
		}
		return $this->username;
	}
	
	public function dispEmail(){	// gets email to display please?
		$db = new PDO('mysql:host=127.0.0.1;dbname=test','root','');
		$id = $_SESSION['nodeID'];
		$rows = $db->query('SELECT email FROM authusers WHERE nodeID = "' .$id. '"');
		foreach ($rows as $row){
			for($i=0; $i < sizeof($row)/2; $i++){
				echo "  " . $row[$i] ;
			}
			echo "<br />";
		} 
	}
	
	public function dispLog(){		// yes
		$db = new PDO('mysql:host=127.0.0.1;dbname=test','root','');
		$id = $_SESSION['nodeID'];
		$rows = $db->query('SELECT DISTINCT nodeID = "' .$id. '", date, time, log FROM log WHERE nodeID = "' .$id. '"');
		foreach ($rows as $row){
			for($i=0; $i < sizeof($row)/2; $i++){
				echo " | " . $row[$i] ;
			}
			echo "<br />";
		} 
		// return $this->log;
	}
	
}
?>