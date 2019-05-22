<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manege Bleijenberg</title>	
	<link rel="stylesheet" href="<?= URL ?>public/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="headerImage col-12"></div>
			<?php if ($feedback == 'created_user'){ ?>
				<div class="col-12 text-center alert alert-success" role="alert">
					Gebruiker succesvol geregistreerd.
				</div>
			<?php } 
			elseif ($feedback == 'no_changes' ) {?>
				<div class="col-12 text-center alert alert-warning" role="alert">
					Geen wijzigingen opgeslagen.
				</div>
			<?php } 
			elseif ($feedback == 'edited' ) {?>
				<div class="col-12 text-center alert alert-success" role="alert">
					Wijzigingen opgeslagen.
				</div>
			<?php } 
			elseif ($feedback == 'deleted' ) {?>
				<div class="col-12 text-center alert alert-danger" role="alert">
					User verwijderd.
				</div>
			<?php } 
			elseif ($feedback == 'created_horse' ) {?>
				<div class="col-12 text-center alert alert-success" role="alert">
					Paard geregistreerd.
				</div>
			<?php } ?>
			<nav class=" col-12 navbar navbar-expand-lg navbar-dark bg-primary">
				<?php if ($_SESSION['loggedin'] == true){ ?>
				<a href="<?php echo URL ?>user/index" class=navbar-brand>Manege Bleijenberg</a>
				<?php } else{ ?>
				<a href="<?php echo URL ?>home/index" class="navbar-brand">Manege Bleijenberg</a> <!-- Voor de Logo -->
				<?php } ?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <!-- Belangrijk # in data-target --> 
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<?php if ($_SESSION['loggedin'] != true){ ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo URL ?>user/create">Registeren</a>
						</li>
						<?php } ?>
						<?php if ($_SESSION['loggedin'] == true){ ?>
						<li class="nav-item">
							<a class="nav-link" href="#">Paard Reserveren</a>
						</li>
						<li class="nav-item dropdown"> <!-- Voor een dropdown belangrijk! -->
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">Overzichten</a> <!-- Voor een dropdown belangrijk! class en id en data-toggle -->
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo URL ?>user/read">Overzicht leden</a>
								<a class="dropdown-item" href="#">Overzicht paarden</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo URL ?>horse/create">Paard Registeren</a>
							</div>
						</li>
						<?php } ?>
						<li class="nav-item">
							<?php if ($_SESSION['loggedin'] == true){ ?>
							<a class="nav-link" href="<?php echo URL ?>user/logout">Logout</a>
							<?php } else{ ?>
							<a class="nav-link" href="<?php echo URL ?>user/loginform">Login</a>
							<?php } ?>
						</li>						
					</ul>
				</div>
			</nav>
	</div>
	