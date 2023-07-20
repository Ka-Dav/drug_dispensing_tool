<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("doctor");
$db = new DB();
?>

<?php include 'header.php'; ?>
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
            <th>Action</th>
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
            echo '<td>';
            echo '<a href="viewPatient.php?s='.$row['SSN']. '" class="button edit">View</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
