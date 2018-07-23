<?php
$uname = $_SESSION['username'];
class AuthUser extends GuestUser{
	
	public function printUserInfo(){
		$db = new PDO('mysql:host=142.156.193.61;dbname=test', $uname, 'MAJiK');
		
		$rows = $db->query('SELECT * FROM authusers ORDER by nodeID = 2');
		foreach ($rows as $row){
			for($i=0; $i < sizeof($row)/2; $i++){
				echo " | " . $row[$i];
			}
		}
	}
	
	public function editUserPass(string $password){
		$id = $_SESSION['nodeID'];
		$db = new PDO('mysql:host=142.156.193.61;dbname=test', $uname, 'MAJiK');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$query = 'UPDATE authusers SET password = "' .$password. '" WHERE nodeID = "' .$id. '"';
		$statement = $db->prepare($query);
		$statement->bindvalue('password', $password);		
		$email =  $_POST['password'];
		
		$params = [
			'password' => $password
		];
		
		$result = $statement->execute($params);
	}
	public function editUserEmail(string $email){
		$id = $_SESSION['nodeID'];
		$db = new PDO('mysql:host=142.156.193.61;dbname=test', $uname, 'MAJiK');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$query = 'UPDATE authusers SET email = "' .$email. '" WHERE nodeID = "' .$id. '"';
		$statement = $db->prepare($query);
		$statement->bindvalue('email', $email);		
		$email =  $_POST['email'];
		
		$params = [
			'email' => $email
		];
		
		$result = $statement->execute($params);
	}
	
	public function editLogInfo(string $log){
		$id = $_SESSION['nodeID'];		
		$db = new PDO('mysql:host=142.156.193.61;dbname=test', $uname, 'MAJiK');
		$query = 'INSERT INTO log(nodeID, date, time, log) VALUES ("' .$id. '", NOW(), CURRENT_TIME(), :log)';
		//echo $log;
		$statement = $db->prepare($query);
		//$statement->bindvalue('log', $log);		

		$params = [
			'log' => $log
		];
		$result = $statement->execute($params);
	}
	
	public function addUser(string $username, string $password, string $email){
		$db = new PDO('mysql:host=142.156.193.61;dbname=test', $uname, 'MAJiK');
		$query = 'INSERT INTO authusers(username, password, email) VALUES (:username, :password, :email)';
		$statement = $db->prepare($query);
		
		$params = [
			'username' => $username,
			'password' => $password,
			'email' => $email
		];
		$result = $statement->execute($params);
	}
	
}
	
?>