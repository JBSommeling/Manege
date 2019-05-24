<div class="row">
	<div class="jumbotron mb-4">
		<p class="lead">Weet u zeker dat u <?php echo $result['username'] ?> wilt verwijderen?</p>
		<a href="<?php echo URL ?>user/destroy/<?php echo $result['id']; ?>"><button class="btn btn-secondary mb-4 w-100">Verdwijderen</button></a>
		<a href="<?php echo URL ?>user/read"><button class="btn btn-secondary w-100">Terug</button></a>
	</div>
</div>