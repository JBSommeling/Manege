<?php 

function createReservation($fields){
	$conn = openDatabaseConnection();

	$sql = "INSERT INTO reservations(user_id, horse_id, rides, time_start) VALUES( :user_id, :horse_id, :rides, :time_start)";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([':user_id' => $fields['user_id'],
	    					':horse_id' => $fields['horse_id'],
	    					':rides' => $fields['rides'],
	    					':time_start' => $fields['time_start']]);
}

function getReservation($user_id){
	$conn = openDatabaseConnection();

	$sql = 'SELECT * FROM users LEFT JOIN reservations ON users.user_id = reservations.user_id LEFT JOIN horses ON reservations.horse_id = horses.horse_id WHERE users.user_id = :user_id';
	 $stmt = $conn->prepare($sql);
	 $stmt->execute([':user_id' => $user_id]);
	 return $stmt->fetchAll();
}

function getAllReservations(){
	$conn = openDatabaseConnection();

	$sql = 'SELECT * FROM reservations LEFT JOIN users ON users.user_id = reservations.user_id LEFT JOIN horses ON reservations.horse_id = horses.horse_id GROUP BY reservations.user_id';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function getReservationById($id){
	$conn = openDatabaseConnection();

	$sql = 'SELECT * FROM reservations LEFT JOIN horses ON reservations.horse_id = horses.horse_id LEFT JOIN users ON users.user_id = reservations.user_id WHERE reservations.reservation_id = :id';
	$stmt = $conn->prepare($sql);
	$stmt->execute([':id' => $id]);
	return $stmt->fetch();
}

function updateReservationById($id, $fields){
	$conn = openDatabaseConnection();

	$sql = 'UPDATE reservations SET horse_id = :horse_id, rides = :rides WHERE reservation_id = :id';
	$stmt = $conn->prepare($sql);
	$stmt->execute([':horse_id' => $fields['horse_id'],
					':rides' => $fields['rides'],
					':id' => $id]);
	return $stmt->fetch();
}

function deleteReservation($reservation_id){
	$conn = openDatabaseConnection();

	$sql = 'DELETE FROM reservations WHERE reservation_id = :reservation_id';
	$stmt = $conn->prepare($sql);
	$stmt->execute([':reservation_id' => $reservation_id]);
}

function deleteReceipts($user_id){
	$conn = openDatabaseConnection();

	$sql = 'DELETE FROM reservations WHERE user_id = :user_id';
	$stmt = $conn->prepare($sql);
	$stmt->execute([':user_id' => $user_id]);
}