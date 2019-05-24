<div class="row">
	<div class="jumbotron mb-4 col-12">
		<form method="POST" action="<?php echo URL ?>/user/store">
			<div class="form-group">
				<label for="name">Naam: <span class="text-danger">* <?php echo $username_err ?></span></label>
				<input type="text" class="form-control" name="username" id="username" value="<?php  echo $username ?>">
			</div>
			<div class="form-group">
				<label for="adress">Adres: <span class="text-danger">* <?php echo $adress_err ?></span></label>
				<input type="text" class="form-control" name="adress" id="adress" value="<?php echo $adress ?>">
			</div>
			<div class="form-group">
				<label for="telephone">Telefoon: <span class="text-danger">* <?php echo $telephone_err ?></span></label>
				<input type="text" class="form-control" name="telephone" id="telephone" value="<?php  echo $telephone ?>">
			</div>
			<div class="form-group">
				<label for="password">Wachtwoord: <span class="text-danger">* <?php echo $user_password_err ?></span></label>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<div class="form-group">
				<label for="confirm_password">Bevestig wachtwoord: <span class="text-danger">* <?php echo $confirm_password_err ?></span></label>
				<input type="password" class="form-control" name="confirm_password" id="confirm_password">
			</div>
			<button type="submit" class="btn btn-secondary">Versturen</button>
		</form>
		<p>Al geregistreerd? <a href="<?php echo URL ?>user/loginform">Login hier</a>.
	</div>
</div>