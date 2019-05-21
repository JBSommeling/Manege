	<?php echo $_SESSION['loggedin']; ?>
	<div class="row">
		<div class="jumbotron col-12">
			<h1 class="lead text-center">Welkom <?php echo $result['username']; ?> <br> bij Manege Bleijenberg</h1>
			<br>
			<p>Uw adres is: <?php echo $result['adress']; ?> <br>
				Uw telefoonnummer is <?php echo $result['telephone']; ?> <br>
				Klopt dit nog? Wijzig <a href="<?php echo URL ?>user/edit">hier.</a>
			</p>
		</div>
	</div>
