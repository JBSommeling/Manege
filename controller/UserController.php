<?php 
require(ROOT . "model/UserModel.php");

function index(){

	session_start();
 
	// Check if the user is logged in, if not then redirect to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location:".URL."user/loginform");
	    exit;
	}

	$username = $_SESSION['username'];
	$result = getUser($username);
	render("user/index", array('result' => $result));
}

function loginform(){
	$username = $password = "";
	$username_err = $password_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	    // Check if username is empty
	    if(empty (formVal($_POST["username"]))){
	        $username_err = "Verplicht veld.";
	    } else{
	        $username = formVal($_POST["username"]);
	    }
	    
	    // Check if password is empty
	    if(empty(formVal($_POST["password"]))){
	        $password_err = "Verplicht om wachtwoord in te voeren.";
	    } else{
	        $password = formVal($_POST["password"]);
	    }

	     // Validate credentials
	    if(empty($username_err) && empty($password_err)){
	    	$param_username = formVal($_POST['username']);
	    	$row = getUsername($param_username);
	    	if($row){
	    		$id = $row["id"];
	            $username = $row["username"];
	            $hashed_password = $row["password"];
	            var_dump($hashed_password);
	            if($password == $hashed_password){
	            	// Password is correct, so start a new session
	                session_start();
	                            
	                // Store data in session variables
	                $_SESSION["loggedin"] = true;
	                $_SESSION["id"] = $id;
	                $_SESSION["username"] = $username;                            
	                            
	                // Redirect user to welcome page
	                header("location: ".URL."user/index");
	                exit();
	            }
	            else{
	            	// Display an error message if password is not valid
	                $password_err = "Wachtwoord komt niet overeen.";
	            }
	    	}
	        else{
	            // Display an error message if password is not valid
	            $password_err = "Wachtwoord komt niet overeen.";
	        }
	    }
        
	}
	render("user/loginform", array('user_name_Err' => $username_err,
        							'user_password_Err' => $password_err));
}

function logout(){
	// Initialize the session
	session_start();
	 
	// Unset all of the session variables
	$_SESSION = array();
	 
	// Destroy the session.
	session_destroy();
	// Redirect to login page
	header("location:".URL."user/loginform");
	exit;

	render("user/logout");
}

function create(){
	session_start();
	$fields = ['username' => "",
				'password' => "",
				'confirm_password' => "",
				'adress' => "",
				'telephone' => ""];
	
	$fieldErr = ['username' => "",
				'password' => "",
				'confirm_password' => "",
				'adress' => "",
				'telephone' => ""];

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$validate = true;
		if (empty($_POST['username'])){
			$fieldErr['username'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['username'] = formVal($_POST['username']);
			if (!preg_match("/^[a-zA-Z- ]*$/",$fields['username'])) {
				$fieldErr['username'] = 'Alleen letters.';
				$fields['username'] = "";
				$validate = false;
			}
		}

		if (empty($_POST['password'])){
			$fieldErr['password'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['password'] = formVal($_POST['password']);
		}

		if (empty($_POST['confirm_password'])){
			$fieldErr['confirm_password'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['confirm_password'] = formVal($_POST['confirm_password']);
			if($fields['confirm_password'] != $fields['password']){
	            $fieldErr['confirm_password'] = "Wachtwoorden komen niet overeen.";
	            $fieldErr['password'] = "Wachtwoorden komen niet overeen";
	            $validate = false;
        	}
		}

		if (empty($_POST['adress'])){
			$fieldErr['adress'] = 'Veld is verplicht';
			$validate = false;
		}
		else{
			$fields['adress'] = formVal($_POST['adress']);
		}

		if (empty($_POST['telephone'])){
			$fieldErr['telephone'] = 'Veld is verplicht';
			$validate = false;
		}
		else{
			$fields['telephone'] = formVal($_POST['telephone']);
			if (!preg_match("/^[0-9 ]*$/",$fields['telephone'])) {
				$fieldErr['telephone'] = 'Alleen cijfers.';
				$fields['telephone'] = "";
				$validate = false;
			}
		}
	}


	render("user/create", array('username_err' => $fieldErr['username'],
									'user_password_err' => $fieldErr['password'],
									'confirm_password_err' =>$fieldErr['confirm_password'],
									'adress_err' => $fieldErr['adress'],
									'telephone_err' => $fieldErr['telephone'],
									'username' => $fields['username'],
									'adress' => $fields['adress'],
									'telephone' => $fields['telephone']));


	if ($validate){
		createUser($fields['username'], $fields['adress'], $fields['telephone'], $fields['password']);
	}
}