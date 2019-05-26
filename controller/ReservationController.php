<?php 
require(ROOT . "model/ReservationModel.php");
require(ROOT . "model/HorseModel.php");
require(ROOT . "model/UserModel.php");


function create(){
	login();
	render('reservation/create', array('result_users' => getAllUsers(),
										'result_horses' => getAllHorses()));
}

function store(){
	login();
	$fields = ['user_id' => "",
				'horse_id' => "",
				'rides' => ""];

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$validate = true;
		$fields['user_id'] = formVal($_POST['user_id']);
		$fields['horse_id'] = formVal($_POST['horse_id']);
		$fields['rides'] = formVal($_POST['rides']);
	}

	$result = getReservation($fields['user_id']);

	if ($validate){
			createReservation($fields);	
			header('Location: '.URL.'reservation/checkout/'.$fields['user_id']);
	}
}

function checkout($user_id){
	login();
	$result = getReservation($user_id);

	$totalhours = 0;
	foreach ($result as $key => $row){ 
			$totalhours += $row['rides']; 
	}
	$total = $totalhours*55;

	render('reservation/checkout', array('result' => $result,
										'totalhours' => $totalhours,
										'total' => $total));
}

function read(){
	login();

	$result = getAllReservations();

	render('reservation/read', array('result' => $result));
}