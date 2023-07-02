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
    <link rel="stylesheet" href="admin.css"/>
</head>
<body>
    <nav class="navbar">
        <div class="nav-links">
            <a href="index.php">Home</a> 
            <a href="patients.php">Patients</a>
            <a href="#" class="active">Doctors</a>
            <a href="contracts.php">Contracts</a>
        </div>
        <div classs="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="btn delete">Logout</a>
        </div>
    </nav>
    <main>
        <h2>Doctors</h2>
        <a href="newDoctor.php" class="button edit">New</a>
    <table>
        <tr>
            <th>SSN</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Years of speciality</th>
            <th>Speciality</th>
            <th>Action</th>
        </tr>
        <?php
        $data = $db->select("doctors")["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['SSN']??''."</td>";
            echo "<td>".$row['fname']??'' ."</td>";
            echo "<td>".$row['lname']??'' ."</td>";
            echo "<td>".$row['years_of_experience']??'' ."</td>";
            echo "<td>".$row['speciality']??'' ."</td>";
            echo '<td>';
            echo '<a href="editPatient.php/s='.$row['SSN']. '" class="button edit">Edit</a>';
            echo '<a href="../../src/handleDelete.php?s='.$row['SSN'].'&t=doctor" class="button delete">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
