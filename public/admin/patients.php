<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("admin");
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../../assets/css/common.css"/>
</head>
<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="index.php">Home</a> 
            <a href="#" class="active">Patients</a>
            <a href="doctors.php">Doctors</a>
            <a href="contracts.php">Contracts</a>
        </div>
        <div classs="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="btn delete">Logout</a>
        </div>
    </nav>
    <main>
        <h2>Patients</h2>
        <a href="newPatient.php" class="button edit">New</a>
    <table>
        <tr>
            <th>SSN</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
        $data = $db->select("patients")["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['SSN']??''."</td>";
            echo "<td>".$row['fname']??'' ."</td>";
            echo "<td>".$row['lname']??'' ."</td>";
            echo "<td>".$row['dob']??'' ."</td>";
            echo "<td>".$row['address']??'' ."</td>";
            echo '<td>';
            echo '<a href="editPatient.php?s='.$row['SSN']. '" class="button edit">Edit</a>';
            echo '<a href="../../src/handleDelete.php?s='.$row['SSN'].'&t=patient" class="button delete">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
