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
    <header>
        <h2>Prescriptions</h2>
        <a href="newPrescription.php" class="button edit">New</a>
    </header>
    <table>
        <tr>
            <th>Patient SSN</th>
            <th>Drug Name</th>
            <th>Frequency</th>
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
            echo "<td>".$row['frequency']??'' ."</td>";
            echo "<td>".$row['quantity']??'' ."</td>";
            echo "<td>".$row['date']??'' ."</td>";
            echo '<td>';
            echo '<a href="prescription.php?i='.$row['id'].'" class="button edit">View</a>';
            if(!$row['dispensed']){
                echo '<a href="../../src/prescriptions.php?i='.$row['patient_ssn'].'" class="button delete">Delete</a>';
            }
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
