<div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naam</th>
        <th scope="col">Ruiters ID</th>
        <th scope="col">Factuur inzien</th>
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
        <td><?php echo $row['user_id']; ?></td>
        <td><a href="<?php echo URL ?>reservation/checkout/<?php echo $row['user_id']; ?>"><i class="fas fa-eye"></i></a></td>
        <td><a href="<?php echo URL ?>user/edit/<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a></td>
        <td><a href="<?php echo URL ?>user/delete/<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
      </tr>

      <?php $number+=1; } ?>
    </tbody>
  </table>
</div>