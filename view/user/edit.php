<div class="row">
	<div class="jumbotron mb-4 col-12">
		<form method="POST" action="<?php echo URL ?>user/update/<?php echo $result['id']; ?>">
			<div class="form-group">
				<label for="name">Naam: <span class="text-danger">* <?php echo $username_err ?></span></label>
				<input type="text" class="form-control" name="username" id="username" value="<?php  echo $result['username']; ?>">
			</div>
			<div class="form-group">
				<label for="adress">Adres: <span class="text-danger">* <?php echo $adress_err ?></span></label>
				<input type="text" class="form-control" name="adress" id="adress" value="<?php echo $result['adress'] ?>">
			</div>
			<div class="form-group">
				<label for="telephone">Telefoon: <span class="text-danger">* <?php echo $telephone_err ?></span></label>
				<input type="text" class="form-control" name="telephone" id="telephone" value="<?php  echo $result['telephone']; ?>">
			</div>
			<button type="submit" class="btn btn-secondary mb-4 w-100 text-center">Versturen</button>
		</form>
			<a href="<?php echo URL ?>user/index/no_changes"><button class="btn btn-secondary w-100">Vorige</button></a>
	</div>
</div>