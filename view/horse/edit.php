<div class="row">
	<div class="container">
		<div class="jumbotron">
			<form method="POST" action="<?php echo URL ?>horse/update/<?php echo $result['horse_id'];?>">
				<div class="form-group">
					<label for="horse_name">Naam van het paard: <span class="text-danger">* <?php echo $fieldErr['horse_name']; ?></span></label>
					<input type="text" name="horse_name" id="horse_name" class="form-control" value="<?php echo $result['horse_name']; ?>">
				</div>
				<div class="form-group">
					<label for="horse_breed">Paardenras:<span class="text-danger">* <?php echo $fieldErr['horse_breed']; ?></span></label>
					<input type="text" name="horse_breed" id="horse_breed" class="form-control" value="<?php echo $result['horse_breed']; ?>">
				</div>
				<div class="form-group">
					<label for="horse_age">Leeftijd van het paard:<span class="text-danger">* <?php echo $fieldErr['horse_age']; ?></span></label>
					<input type="number" name="horse_age" id="horse_age" class="form-control" min="1" max="20" value="<?php echo $result['horse_age']; ?>">
				</div>
				<div class="form-group">
					<label for="wither_height">Schofthoogte in cm:<span class="text-danger">* <?php echo $fieldErr['wither_height']; ?></span></label>
					<input type="number" name="wither_height" id="wither_height" class="form-control" min="100" max="200" step="0.5" value="<?php echo $result['wither_height']; ?>">
				</div>
				<div class="form-group">
					<label for="horse_jumping">Klaar voor springsport:<span class="text-danger">* <?php echo $fieldErr['horse_jumping']; ?></span></label>
					<select name="horse_jumping" id="horse_jumping" class="form-control">
						<option value="0">Nee</option>
						<option value="1">Ja</option>
					</select>
				</div>
				<button type="submit" class="btn btn-secondary">Aanpassen</button>
			</form>
		</div>
	</div>
</div>