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
            <a href="patients.php" class="active">Patients</a>
            <a href="doctors.php">Doctors</a>
            <a href="">Contracts</a>
        </div>
        <div classs="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="btn delete">Logout</a>
        </div>
    </nav>
    <main>
        <h2>Contracts with pharmaceutical companies</h2>
        <button class="button edit">New</button>
    <table>
        <tr>
            <th>Company Name</th>
            <th>phone number</th>
            <th>Expiry date</th>
            <th>Action</th>
        </tr>
        <?php
        $data = $db->select("pharmaceutical_companies")["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['Company Name']??''."</td>";
            echo "<td>".$row['phone_number']??'' ."</td>";
            echo "<td>".$row['expiry_date']??'' ."</td>";
            echo '<td>
                    <form method="post">
                        <input type="submit" name="edit"
                        class="button edit" value="edit" />
          
                        <input type="submit" name="delete"
                        class="button delete" value="delete" />
                    </form>
                  </td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
