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
    <title> Login</title>
  </head>
  <body>
   <h1>LOGIN PAGE</h1>
   <form action="../../src/loginHandler.php" method="POST">
  
    <label for="ssn">SNN:</label>  
    <input type="text" id="ssn" name="ssn" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="role">Role:</label>
    <select name="role" id="role">
     <option value="patient">Patient</option>
     <option value="doctor">Doctor</option>
     <option value="pharmacist">Pharmacist</option>
     <option value="admin">Admin</option>
     </select>
     <br><br>

    <input type="submit" value="Login"/>
   </form>

  </body>
</html>