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
    <link rel="stylesheet" href="../../assets/css/common.css"/>
</head>
<body>
   <?php include 'nav.php'; ?>
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
        $where = "primary_doctor=".$login_session["SSN"];
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
