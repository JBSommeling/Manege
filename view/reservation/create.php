<div class="row">
	<div class="jumbotron">
		<p class="lead">Een paard huren kost 55 euro per uur.</p>
		<form method="POST" action="<?php echo URL ?>reservation/store">
			<div class="form-group">
				<label for="user_id">Selecteer ruiter:</label>
				<select name="user_id" id="user_id" class="form-control">
					<?php foreach ($result_users as $key => $row){ ?>
						<option value="<?php echo $row['user_id'] ?>"><?php echo $row['username'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="horse_name">Selecteer paard:</label>
				<select name="horse_id" id="horse_id" class="form-control">
					<?php foreach ($result_horses as $key => $row){ ?>
						<option value="<?php echo $row['horse_id'] ?>"><?php echo $row['horse_name'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="rides">Selecteer aantal ritten (één rit is 60 minuten):</label>
				<input type="number" name="rides" id="rides" class="form-control" min="1" max="12">
			</div>
			<button type="submit" class="btn btn-secondary w-100">Reserveer</button>
		</form>
	</div>
</div>