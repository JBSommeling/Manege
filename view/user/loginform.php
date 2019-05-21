<?php var_dump($_SESSION['loggedin']); ?>

<div class="row">
	<div class="jumbotron mb-4 col-12">
		<form method="POST">
			<div class="form-group">
				<label for="name">Username: <span class="text-danger">* <?php echo $user_name_Err ?></span></label>
				<input type="text" class="form-control" name="username" id="username">
			</div>
			<div class="form-group">
				<label for="password">Password: <span class="text-danger">* <?php echo $user_password_Err ?></span></label>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<button type="submit" class="btn btn-secondary">Inloggen</button>
		</form>
	</div>
</div>