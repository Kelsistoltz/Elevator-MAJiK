<?php


$db = new PDO('mysql:host=142.156.193.61;dbname=elevator', 'Mike', 'MAJiK');
		
		$rows = $db->query('SELECT * FROM elevatornetwork ORDER by nodeID = 2');
		foreach ($rows as $row){
			for($i=0; $i<sizeof($row)/2; $i++){
				echo " | " . $row[$i];
			}
		}
class elevatorComms{
	public function printElevatorInfo(){
		$db = new PDO('mysql:host=142.156.193.61;dbname=elevator', 'Mike', 'MAJiK');
		
		$rows = $db->query('SELECT * FROM elevatornetwork ORDER by nodeID = 2');
		foreach ($rows as $row){
			for($i=0; $i<sizeof($row)/2; $i++){
				echo " | " . $row[$i];
			}
		}
	}
	
	public function editElevatorInfo(){
		$query = 'UPDATE elevatornetwork SET status = :elevatorStat requestedFloor = :elevatorReq WHERE nodeID = 1';
		$statement = $db->prepare($query);
		$requestedFloor = $_POST['requestedFloor'];
		$params = [
			'requestedFloor' => $requestedFloor
		];
		
		$result = $statement->execute($params);
	}
	
	
}
?>