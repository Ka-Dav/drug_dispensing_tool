<?php
require_once("../../src/db.php");

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $role = $_SESSION['role'];
   header("location: ../$role/index.php");
  die();
}

$db = new DB();
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $ssn = $_POST['ssn'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $table;
  switch($role) {
    case 'doctor':
        $table = 'doctors';
        break;
    case 'patient':
        $table = 'patients';
        break;
    case 'pharmacist':
        $table = 'pharmacists';
        break;
    case 'admin':
        $table = 'admins';
        break;
    default:
        $error = 'Fill in missing fields';
  }
	$result = $db->login($ssn,$password,$table);

    if(mysqli_num_rows($result) == 1) {
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["ssn"] = $user['SSN'];
        $_SESSION["fname"] = $user['fname'];
        $_SESSION["lname"] = $user['lname'];
        $_SESSION["role"] = $role;
       
       header("location: ../$role/index.php");
    }else {
      $error = 'Invalid credentials';
    }
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
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form">
        <?php 
          if($error)echo "<p class='error'>$error</p>";
        ?>
        <div class="input-group">
          <label for="ssn">SNN:</label>  
          <input type="number" id="ssn" name="ssn" required>
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