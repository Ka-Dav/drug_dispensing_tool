<?php 
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("admin");
?>

<?php include 'header.php'; ?>
  <body>
    <main>
      <h2>Administrator Registration Form</h2>
      <form action="../../src/admins.php" method="POST">
        <label for="ssn">SSN:</label>
        <input type="text" id="ssn" name="ssn" required><br><br>
        
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="fname" required><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lname" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="hidden" name="op" value="new">
        <input type="submit" value="Submit">
      </form>
    </main>
  </body>
</html>