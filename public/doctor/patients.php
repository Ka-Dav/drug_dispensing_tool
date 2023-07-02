<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("doctor");
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor</title>
    <link rel="stylesheet" href="doctor.css"/>
</head>
<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="index.php">Home</a> 
            <a href="#" class="active">Patients</a>
            <a href="#">Prescriptions</a>
        </div>
        <div classs="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="btn delete">Logout</a>
        </div>
    </nav>
    <main>
        <h2>Patients</h2>
    <table>
        <tr>
            <th>SSN</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Address</th>
        </tr>
        <?php
        $where = "SSN=".$login_session["SSN"];
        $data = $db->select("patients",$where)["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['SSN']??''."</td>";
            echo "<td>".$row['fname']??'' ."</td>";
            echo "<td>".$row['lname']??'' ."</td>";
            echo "<td>".$row['dob']??'' ."</td>";
            echo "<td>".$row['address']??'' ."</td>";
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
