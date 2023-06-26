<?php
require_once("../src/db.php"); 
$db = new DB();
$option="doctor";
?>
<html>
<head>
  <title>Admin</title>
</head>
<body>
  <h2>Users</h2>
  
  <form method="POST">
    <label for="option">Select an option:</label>
    <select id="option" name="option">
      <option value="doctor">Doctor</option>
      <option value="patient">Patient</option>
    </select>
    <input type="submit"/>
  </form>

  <table border="1">
    <thead>
      <tr>
      <th>SNN</th>
        <th>First Name</th>
        <th>Last Name</th>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
          $option = $_POST['option'];
          echo "<th>";
          echo ($option=== 'doctor') ? 'Years of experience' : 'Address';
          echo "</th>";
          echo "<th>";
          echo ($option=== 'doctor') ? 'Specialization' : 'Age';
          echo "</th>";
        }
        ?>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      if ($option === 'doctor') {
        $data = $db->select("doctors")["message"];
      } else {
        $data = $db->select("patients")["message"];
      } 
      if(count($data)>0){
        foreach ($data as $row){
          echo "<tr>";
          echo"<td>".$row['SSN']. "</td>";
          echo"<td>".$row['fname']."</td>";
          echo"<td>".$row['lname']."</td>";
        
          echo"<td>";
          echo ($option=="patient")? $row['address']:$row["years_of_experience"];
          echo "</td>";

          echo"<td>";
          echo ($option=="patient")? $row['age']:$row["speciality"];
          echo "</td>";

          echo"<td>";
          echo '<a href="../src/handleDelete.php?s='.$row['SSN'].'&t='.$option.'">Delete</a>';
          echo '<a href="updateUser.php?s='.$row['SSN'].'&t='.$option.'">Edit</a>';
          echo "</td>";
          echo "</tr>"; 
      }  
      }
      
    ?>
    </tbody>
  </table>
</body>
</html>
