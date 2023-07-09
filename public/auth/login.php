<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $role = $_SESSION['role'];
   header("location: ../$role/index.php");
    die();
}
?>
<html>
  <head>
    <title>Legacy</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
  </head>
  <body>
    <div class="content">
      <h1>LOGIN</h1>
      <form action="../../src/loginHandler.php" method="POST" class="form">
        <div class="input-group">
          <label for="ssn">SNN:</label>  
          <input type="text" id="ssn" name="ssn" required>
        </div>
        <div class="input-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="input-group">
          <label for="role">Role:</label>
          <select name="role" id="role">
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <input type="submit" value="Login" class="btn"/>
      </form>
    </div>
    <div class="illustration">
      <img src="../../assets/images/image1.jpg" alt="">
    </div>

  </body>
</html>