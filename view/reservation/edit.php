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
		<h1>Wijzig reservering voor <?php echo $reservation['horse_name']; ?></h1>
		<p class="lead">Een paard huren kost 55 euro per uur.</p>
		<form method="POST" action="<?php echo URL ?>reservation/update/<?php echo $reservation['reservation_id']; ?>/<?php echo $reservation['user_id']; ?>">
			<div class="form-group">
				<label for="horse_name">Selecteer paard voor <?php echo $reservation['username']; ?>:</label>
				<select name="horse_id" id="horse_id" class="form-control">
					<?php foreach ($horses as $key => $row){ ?>
						<option value="<?php echo $row['horse_id'] ?>"><?php echo $row['horse_name'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="rides">Selecteer aantal ritten (één rit is 60 minuten):</label>
				<input type="number" name="rides" id="rides" class="form-control" min="1" max="12" value="<?php echo $reservation['rides']; ?>">
			</div>
			<div class="form-group">
				<label for="time">Selecteer de starttijd: <span class="text-danger">* <?php echo $fieldErr['time_start']; ?></span></label>
				<input type="datetime-local" name="time_start" class="form-control">
			</div>
			<button type="submit" class="btn btn-secondary w-100">Opslaan</button>
		</form>
	</div>
</div>