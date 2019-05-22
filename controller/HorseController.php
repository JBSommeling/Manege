<?php 
require(ROOT . "model/HorseModel.php");

function create(){
	session_start();
 
	// Check if the user is logged in, if not then redirect to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location:".URL."user/loginform");
	    exit;
	}

	$fields = ['horse_name' => '',
				'horse_breed' => '',
				'horse_age' => '',
				'wither_height' => '',
				'horse_jumping' => '',
				'horse_pony' => ''];

	$fieldErr = [];

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$validate = true;
		if(empty($_POST['horse_name'])){
			$fieldErr['horse_name'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['horse_name'] = formVal($_POST['horse_name']);
			if (!preg_match("/^[a-zA-Z- ]*$/",$fields['horse_name'])) {
				$fieldErr['horse_name'] = 'Alleen letters.';
				$fields['horse_name'] = "";
				$validate = false;
			}
		}

		if(empty($_POST['horse_breed'])){
			$fieldErr['horse_breed'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['horse_breed'] = formVal($_POST['horse_breed']);
			if (!preg_match("/^[a-zA-Z- ]*$/",$fields['horse_breed'])) {
				$fieldErr['horse_breed'] = 'Alleen letters.';
				$fields['horse_breed'] = "";
				$validate = false;
			}
		}

		if(empty($_POST['horse_age'])){
			$fieldErr['horse_age'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['horse_age'] = formVal($_POST['horse_age']);
			if (!preg_match("/^[0-9]*$/",$fields['horse_age'])) {
				$fieldErr['horse_age'] = 'Alleen cijfers';
				$fields['horse_age'] = "";
				$validate = false;
			}
		}

		if(empty($_POST['wither_height'])){
			$fieldErr['wither_height'] = 'Veld is verplicht.';
			$validate = false;
		}
		else{
			$fields['wither_height'] = formVal($_POST['wither_height']);
			if ($fields['wither_height'] < 147.5){
				$fields['horse_pony'] = 1;
			}
		}

		$fields['horse_jumping'] = formVal($_POST['horse_jumping']);
		if ($_POST['wither_height'] < 147.5 && $_POST['horse_jumping'] == 1){
			$fieldErr['horse_jumping'] = 'Dit paard is een pony, en dus niet geschikt voor de springsport';
			$validate = false;
		}
			//Als schofthoogte lager is dan 147.5 dan is het een pony en niet geschik voor springsport.
	}

	if ($validate) {
		createHorse($fields);
		header('Location: '.URL. 'user/index/created_horse');
	}

	render('horse/create', array('fields' => $fields,
								'fieldErr' => $fieldErr));
}