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
				'rides' => "",
				'time_start'=> ""];
	$fieldErr = [];
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$validate = true;
		$fields['user_id'] = formVal($_POST['user_id']);
		if (empty($_POST['horse_id'])) {
			$fieldErr['horse_id'] = 'U moet een paard selecteren.';
			$validate = false;
		}
		else{
			$fields['horse_id'] = formVal($_POST['horse_id']);
		}
		if (empty($_POST['rides']) || $_POST['rides'] == 0) {
			$fieldErr['rides'] = ' U moet minimaal 1 rit selecteren.';
			$validate = false;
		}
		else{
			$fields['rides'] = formVal($_POST['rides']);
		}

		if (empty($_POST['time_start'])){
			$fieldErr['time_start'] = 'U moet een tijd selecteren.';
			$validate = false;
		}
		else{
			$fields['time_start'] = formVal($_POST['time_start']);
		}
	}

	$result = getReservation($fields['user_id']);

	if ($validate){
			createReservation($fields);	
			header('Location: '.URL.'reservation/checkout/'.$fields['user_id']);
	}
	else{
		render('reservation/create', array('result_users' => getAllUsers(),
										'result_horses' => getAllHorses(),
										'fieldErr' => $fieldErr,
										'fields' => $fields));
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

function edit($id){
	login();

	$result = getReservationById($id);

	render('reservation/edit', array('reservation' => $result,
									'horses' => getAllHorses()));
}

function update($reservation_id, $user_id){
	login();
	$fields = [	'horse_id' => "",
				'rides' => ""];

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$validate = true;
		$fields['horse_id'] = formVal($_POST['horse_id']);
		if ($_POST['rides'] <= 0 || empty($_POST['rides'])){
			$validate = false;
		}
		else{
			$fields['rides'] = formVal($_POST['rides']);
		}
	}

	if ($validate) {
		updateReservationById($reservation_id, $fields);
		header('Location: '.URL.'reservation/checkout/'.$user_id);
	}
	else{
		$result = getReservationById($reservation_id);
		render('reservation/edit', array('reservation' => $result,
											'horses' => getAllHorses()));
	}
}

function delete($reservation_id){
	login();

	$result = getReservationById($reservation_id);

	render('reservation/delete', array('result' => $result));
}

function destroy($reservation_id){
	login();

	deleteReservation($reservation_id);
	header("Location: ".URL."reservation/read");
}

function deleteReceipt($reservation_id){
	login();

	$result = getReservationById($reservation_id);
	render('reservation/deleteReceipt', array('result' => $result));

}

function destroyReceipt($user_id){
	login();
	deleteReceipts($user_id);
	header('Location: '.URL.'reservation/read');
}