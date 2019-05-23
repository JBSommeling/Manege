<?php 
function getHorse($id){
	$conn = openDatabaseConnection();

	$sql = 'SELECT * FROM horses WHERE horse_id = :horse_id';
	$stmt = $conn->prepare($sql);
	$stmt->execute([':horse_id' => $id]);
	return $stmt->fetch();
}

function getAllHorses(){
	$conn = openDatabaseConnection();

	$sql = 'SELECT * FROM horses ORDER BY horse_name ASC';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();

}

function createHorse($fields){
	$conn = openDatabaseConnection();

	 $sql = "INSERT INTO horses( horse_name, horse_breed, horse_age, wither_height, horse_pony, horse_jumping) VALUES( :horse_name, :horse_breed, :horse_age, :wither_height, :horse_pony, :horse_jumping)";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([':horse_name' => $fields['horse_name'],
	    					':horse_breed' => $fields['horse_breed'],
	    					':horse_age' => $fields['horse_age'],
	    					":wither_height" => $fields['wither_height'], 
	    					':horse_pony' => $fields['horse_pony'],
	    					':horse_jumping' => $fields['horse_jumping']]);

}

function updateHorse($fields){
	$conn = openDatabaseConnection();

	$sql = 'UPDATE horses SET horse_name = :horse_name, horse_breed = :horse_breed, horse_age = :horse_age, wither_height = :wither_height, horse_pony = :horse_pony, horse_jumping = :horse_jumping WHERE horse_id = :horse_id';
	$stmt = $conn->prepare($sql); 
	$stmt->execute([':horse_name' => $fields['horse_name'], 
					":horse_breed" => $fields['horse_breed'], 
					":horse_age" => $fields['horse_age'],
					":wither_height" => $fields['wither_height'],
					":horse_pony" => $fields['horse_pony'],
					":horse_jumping" => $fields['horse_jumping'],
					":horse_id" =>$fields['horse_id']]); 
}