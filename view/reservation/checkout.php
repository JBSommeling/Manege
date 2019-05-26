<div class="row">
	
	<div class="jumbotron alignment">
		<h1>Uw factuur</h1>
		<p>Naam: <?php echo $result[0]['username'] ?> <br>
			Ruiters ID: <?php echo $result[0]['user_id'] ?> <br>
			Adres: <?php echo $result[0]['adress']; ?> <br>
			Tel: <?php echo $result[0]['telephone']; ?><br>
		Paarden: 
		<ul>
		<?php foreach ($result as $key => $row) { ?>
			<li><?php echo $row['horse_name'] ?>, soort: <?php echo $row['horse_breed']; ?> met aantal ritten: <?php echo $row['rides']; 
				if($row['horse_pony'] == 1){ ?>
					(Pony)
					<?php }
				else{ ?>
					(Volwassen Paard)
				<?php }
				if ($row['horse_jumping'] == 1) { ?>
					 (Springsport: Ja)
				<?php } else{ ?>
					 (Springsport: nee)
				<?php } ?>
				
			<a href="<?php echo URL ?>reservation/edit/<?php echo $row['reservation_id']; ?>"><i class="fas fa-edit"></i></a>
			<a href="<?php echo URL ?>reservation/delete/<?php echo$row['reservation_id']; ?>"><i class="fas fa-trash"></i></a>
			</li>
		<?php } ?></p>
		</ul>
		Totaal aantal ritten(uren): <?php echo $totalhours ?>
		<br>Per uur een paard reserveren kost 55 euro: <br>
		Totale kosten zijn: <?php echo $totalhours ?> x 55 euro = <?php echo $total ?> euro. <br>
		<br>
		<a href="<?php echo URL ?>user/index"><button class="btn btn-secondary w-100">Terug naar hoofdpagina</button></a>
	</div>
</div>