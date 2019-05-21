<?php function getUsername($param_username){
			$conn = openDatabaseConnection();

			// Prepare a select statement
	        $sql = "SELECT id, username, password FROM users WHERE username = :username";
	        $stmt = $conn->prepare($sql);
	        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
	        $stmt->execute();

	                // Check if username exists, if yes then verify password
	                if($stmt->rowCount() == 1){
	                	return $stmt->fetch();
	                } 
	                else{
	                    // Display an error message if username doesn't exist
	                    return false;
	                }
			$conn = null;
}

function getUser($username){
	$conn = openDatabaseConnection();

	$sql = "SELECT * FROM users WHERE username = :username";
	$stmt = $conn->prepare($sql);
	$stmt->execute([':username' => $username]);
	return $stmt->fetch();
}

function getUserById($id){
	$conn = openDatabaseConnection();

	$sql = "SELECT * FROM users WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->execute([':id' => $id]);
	return $stmt->fetch();
}

function createUser($username, $adress, $telephone, $password){
	$conn = openDatabaseConnection();

	 $sql = "INSERT INTO users( username, adress, telephone, password) VALUES( :username, :adress, :telephone, :password)";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([':username' => $username,
	    					':adress' => $adress,
	    					':telephone' => $telephone,
	    					':password' => $password]);
}