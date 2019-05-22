<?php 

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