<?php
require_once("./db.php");
$db = new DB();

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
            onError("Fill in all the fields");
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
       
       header("location: ../public/$role/index.php");
    }else {
       onError("Your Login Name or Password is invalid");
    }
}

function onError($message) {
      echo "Error: '$message'";
      echo "<br/>";
      echo "<a href='../public/auth/login.php'>Back to Login</a>";
      exit();
}
?>