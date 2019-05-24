<?php var_dump($result); ?>

<div class="row">
	<div class="jumbotron">
		<h1>Uw factuur</h1>
		<p>Naam: <?php echo $result[0]['username'] ?> <br>
			Ruiters ID: <?php echo $result[0]['user_id'] ?> <br>
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
				

			</li>
		<?php } ?></p>
		</ul>
		Totaal aantal ritten(uren): 
		<?php $total = 0 ?>
		<?php foreach ($result as $key => $row){ ?>
			<?php $total += $row['rides'] ?>
		<?php } ?>
		<?php echo $total ?>
		<br>Per uur een paard reserveren kost 55 euro:
		<!-- In controller verwerken -->

	</div>
</div>