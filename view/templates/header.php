<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manege Bleijenberg</title>	
	<link rel="stylesheet" href="<?= URL ?>public/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="headerImage col-12"></div>
			<nav class=" col-12 navbar navbar-expand-lg navbar-dark bg-primary">
				<a href="<?php echo URL ?>home/index" class="navbar-brand">Manege Bleijenberg</a> <!-- Voor de Logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <!-- Belangrijk # in data-target --> 
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto"> <!-- ml auto = margin left auto pushes everything to the right -->
						<li class="nav-item">
							<a class="nav-link" href="<?php echo URL ?>user/create">Registeren</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Paard Reserveren</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo URL ?>user/loginform">Login</a>
						</li>						
						<li class="nav-item dropdown"> <!-- Voor een dropdown belangrijk! -->
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">Products</a> <!-- Voor een dropdown belangrijk! class en id en data-toggle -->
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Product 1</a>
								<a class="dropdown-item" href="#">Product 1</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Product 1</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contact</a>
						</li>
					</ul>
				</div>
			</nav>
	</div>
	