<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("doctor");
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../../assets/css/common.css"/>
</head>
<body>
<?php include 'nav.php'; ?>
    <main>
        <h2>Prescriptions</h2>
        <a href="newPrescription.php" class="button edit">New</a>
    <table>
        <tr>
            <th>Patient SSN</th>
            <th>Drug Name</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $where = "doctor_ssn=".$login_session["SSN"];
        $data = $db->select("prescriptions", $where)["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['patient_ssn']??''."</td>";
            echo "<td>".$row['drug_name']??''."</td>";
            echo "<td>".$row['quantity']??'' ."</td>";
            echo "<td>".$row['date']??'' ."</td>";
            echo '<td>';
            echo '<a href="prescription.php?p='.$row['patient_ssn'].'" class="button edit">View</a>';
            echo '<a href="../../src/prescriptions.php?p='.$row['patient_ssn'].'&d='.$login_session["SSN"].'" class="button delete">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
