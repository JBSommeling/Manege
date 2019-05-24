<div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Adres</th>
        <th scope="col">Telefoonnummer</th>
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
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['adress']; ?></td>
        <td><?php echo $row['telephone'] ?></td>
        <td><a href="<?php echo URL ?>user/edit/<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i></a></td>
        <td><a href="<?php echo URL ?>user/delete/<?php echo $row['id']; ?>"><i class="fas fa-user-minus"></i></a></td>
      </tr>

      <?php $number+=1; } ?>
    </tbody>
  </table>
</div>