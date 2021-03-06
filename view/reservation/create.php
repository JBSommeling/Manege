<div class="row">
	<div class="jumbotron alignment">
		<?php $first = true; ?>
		<?php foreach ($result_schedule as $key => $row) {
			if ($result_schedule[$key]['horse_id'] != $result_schedule[$key-1]['horse_id']) {
				if($first == false){
					echo '</table>';
				}
				$first = false; ?>
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col"><?php echo $row['horse_name'] ?></th>
		      <th scope="col">Begintijd</th>
		      <th scope="col">Eindtijd</th>
		      <th scope="col">Uren</th>
		    </tr>
		  </thead>
		  <?php } ?>
		  <tbody>
		    <tr>
		      <th scope="row"><?php echo $row['username'] ?></th>
		      <td><?php echo $row['time_start'] ?></td>
		      <td><?php echo $row['time_end'] ?></td>
		      <td><?php echo $row['rides'] ?></td>
		    </tr>
		  </tbody>
		<?php } ?>
		</table>
			
		<p class="lead">Een paard huren kost 55 euro per uur. <span class="text-danger">* <?php echo $fieldErr['reservation']; ?></span></p>
		<form method="POST" action="<?php echo URL ?>reservation/store">
			<div class="form-group">
				<label for="user_id">Selecteer ruiter:</label>
				<select name="user_id" id="user_id" class="form-control">
					<?php foreach ($result_users as $key => $row){ ?>
						<option value="<?php echo $row['user_id'] ?>"><?php echo $row['username'] ?></option>
					<?php } ?>
				</select>
			</div>
			<p>Eén rit is 60 minuten. <span class="text-danger">* <?php echo $fieldErr['horse_id']; echo $fieldErr['rides']; ?></span></p>
			<div class="form-group d-inline-block">
				<label for="horse_name">Selecteer paard:</label>
				<select name="horse_id" id="horse_id" class="form-control d-inline-block">
					<option value=""></option>
					<?php foreach ($result_horses as $key => $row){ ?>
						<option value="<?php echo $row['horse_id'] ?>"><?php echo $row['horse_name'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group d-inline-block">
				<label for="rides">Selecteer aantal ritten:</label>
				<input type="number" name="rides" id="rides" class="form-control d-inline-block" min="1" max="12" value="<?php echo $fields['rides']; ?>">
			</div>
			<div class="form-group">
				<label for="time">Selecteer de starttijd: <span class="text-danger">* <?php echo $fieldErr['time_start']; ?></span></label>
				<input type="datetime-local" name="time_start" class="form-control" value="<?php echo $fields['time_start']; ?>">
			</div>
			<button type="submit" class="btn btn-secondary w-100">Reserveer</button>
		</form>
	</div>
</div>