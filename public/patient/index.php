<?php 
require_once("../../src/db.php"); 
include('../../src/session.php');
checkRoute("patient");
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient</title>
    <link rel="stylesheet" href="../../assets/css/common.css"/>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h2>Home</h2>
      <div class="user-details">
    <img src="../../assets/images/user.png" alt="User Photo" style="width: 150px; height: 150px; border-radius: 50%;">
    <h2>User Details</h2>
    <?php
      // Fetch user details from PHP
      $ssn = $login_session["SSN"];
      $fname = $login_session["fname"];
      $lname = $login_session["lname"];
      $role = $login_session["role"];

      // Display user details
      echo "<p><strong>SSN:</strong> " . $ssn . "</p>";
      echo "<p><strong>Fist Name:</strong> " . $fname . "</p>";
      echo "<p><strong>Last Name:</strong> " . $lname . "</p>";
      echo "<p><strong>Role:</strong> " . $role . "</p>";
    ?>
  </div>
    </main>
</body>
</html>
