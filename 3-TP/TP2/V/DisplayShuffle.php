<?php session_start();?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Classe</title>
 
 
    <table>
  <thead>
    <tr>
      <th >Every day i'm shufflin</th>
    </tr>
  </thead>
  <tbody>
  <?php for ($i=1; $i < 16 ; $i++) { ?>
 
    <tr>
    <td><?php echo "PLACE_$i"?></td>
    <td><?php echo $_SESSION["studentsLocations"]["PLACE_$i"]  ?></td>
    </tr>
    
 
    <?php } ?>
 
  </tbody>
</table>