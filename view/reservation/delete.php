<div class="row">
	<div class="jumbotron mb-4 alignment">
		<p class="lead">Weet u zeker dat u de reservering met <?php echo $result['horse_name']; ?> wilt verwijderen?</p>
		<a href="<?php echo URL ?>reservation/destroy/<?php echo $result['reservation_id']; ?>"><button class="btn btn-secondary mb-4 w-100">Verwijderen</button></a>
		<a href="<?php echo URL ?>reservation/checkout/<?php echo $result['user_id']; ?>"><button class="btn btn-secondary w-100">Terug</button></a>
	</div>
</div>