<?php 

function createReservation($fields){
	$conn = openDatabaseConnection();

	$sql = "INSERT INTO reservations(user_id, horse_id, rides) VALUES( :user_id, :horse_id, :rides)";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([':user_id' => $fields['user_id'],
	    					':horse_id' => $fields['horse_id'],
	    					':rides' => $fields['rides']]);
}

function getReservation($user_id){
	$conn = openDatabaseConnection();

	$sql = 'SELECT * FROM users LEFT JOIN reservations ON users.user_id = reservations.user_id LEFT JOIN horses ON reservations.horse_id = horses.horse_id WHERE users.user_id = :user_id';
	 $stmt = $conn->prepare($sql);
	 $stmt->execute([':user_id' => $user_id]);
	 return $stmt->fetchAll();
}