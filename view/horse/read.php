<div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Ras</th>
        <th scope="col">Leeftijd</th>
        <th scope="col">Schofthoogte</th>
        <th scope="col">Pony</th>
        <th scope="col">Springsport</th>
        <th scope="col">Wijzigen</th>
        <th scope="col">Verwijderen</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $number = 1;
      foreach ($result as $key => $row) { ?>
      <tr>
        <th scope="row"><?php echo $number ?></th>
        <td><?php echo $row['horse_name']; ?></td>
        <td><?php echo $row['horse_breed']; ?></td>
        <td><?php echo $row['horse_age'] ?> jaar</td>
        <td><?php echo $row['wither_height']; ?> cm</td>
        <?php if($row['horse_pony'] == 1){ ?>
          <td>Ja</td>
        <?php } else{?>
          <td>Nee</td>
        <?php } ?>
        <?php if($row['horse_jumping'] == 1){ ?>
          <td>Ja</td>
        <?php } else{?>
          <td>Nee</td>
        <?php } ?>
        <td><a href="<?php echo URL ?>horse/edit/<?php echo $row['horse_id']; ?>"><i class="fas fa-user-edit"></i></a></td>
        <td><a onclick="return validation()"href="<?php echo URL ?>horse/delete/<?php echo $row['horse_id']; ?>"><i class="fas fa-user-minus"></i></a></td>
      </tr>

      <?php $number+=1; } ?>
    </tbody>
  </table>
</div>