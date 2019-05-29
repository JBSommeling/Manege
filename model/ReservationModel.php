<?php 
function isValidReservation($fields){
	$conn = openDatabaseConnection();

	$sql = "SELECT *, date_add(time_start, INTERVAL rides HOUR) as time_end FROM reservations WHERE horse_id = :horse_id AND ((:time_start >= time_start AND :time_start <= date_add(time_start, INTERVAL rides HOUR)) OR (date_add(:time_start, INTERVAL :rides HOUR) >= time_start AND date_add(:time_start, INTERVAL :rides HOUR) <= date_add(time_start, INTERVAL rides HOUR)))";
	$stmt = $conn->prepare($sql);
	$stmt->execute([':rides' => $fields['rides'],
	    			':time_start' => $fields['time_start'],
	    			':horse_id' => $fields['horse_id']]);
	$result = $stmt->fetchAll();
	if (count($result)>0){
		return false;
	}
	else{
		return true;
	}
}


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

	$sql = 'SELECT *, date_add(time_start, INTERVAL rides HOUR) as time_end  FROM reservations LEFT JOIN users ON users.user_id = reservations.user_id LEFT JOIN horses ON reservations.horse_id = horses.horse_id WHERE reservations.user_id = :user_id';
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