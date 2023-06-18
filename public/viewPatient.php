<?php 
require_once("../src/db.php"); 
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patients</title>
</head>
<body>
<div class="container">
      <table>
       <thead><tr>
        <th>SNN</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Age</th>
         <th>Address</th>
        </thead>
    <tbody>
    <?php
        $rows = $db->select("patients")["message"];
        foreach($rows as $data){
    ?>
      <tr>
      <td><?php echo $data['SSN']; ?></td>
      <td><?php echo $data['fname']??''; ?></td>
      <td><?php echo $data['lname']??''; ?></td>
      <td><?php echo $data['age']??''; ?></td>
      <td><?php echo $data['address']??''; ?></td>
      </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
</body>
</html>