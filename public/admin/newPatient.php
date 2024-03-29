<?php 
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("admin");

$db = new DB();
$doctors = $db->select("doctors")["data"];
?>

<?php include 'header.php'; ?>
  <body>
    <main>
      <h2>Patient Registration Form</h2>
      <form action="../../src/patients.php" method="POST">
        <label for="ssn">SSN:</label>
        <input type="text" id="ssn" name="ssn" required><br><br>
        
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="fname" required><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lname" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <label for="dob">Date of birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <label for="doctor">Primary Doctor:</label>
        <select name="doctor" id="doctor" required>
          <?php
              foreach($doctors as $doctor){
                $name = $doctor["fname"] . " " . $doctor["lname"];
                $ssn = $doctor["SSN"];
                echo "<option value='$ssn'>$name</option>";
              }
          ?>
        </select>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="hidden" name="op" value="new">
        <input type="submit" value="Submit">
      </form>
    </main>
  </body>
</html>