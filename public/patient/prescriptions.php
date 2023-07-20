<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("patient");
$db = new DB();
?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h2>Prescriptions</h2>
    <table>
        <tr>
            <th>Doctor SSN</th>
            <th>Drug Name</th>
            <th>Quantity</th>
            <th>Dispensed</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $where = "patient_ssn=".$login_session["SSN"];
        $data = $db->select("prescriptions", $where)["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['doctor_ssn']??''."</td>";
            echo "<td>".$row['drug_name']??''."</td>";
            echo "<td>".$row['quantity']??'' ."</td>";
            echo "<td>".($row['dispensed']?'True':'False')."</td>";
            echo "<td>".$row['date']??'' ."</td>";
            echo '<td>';
            echo '<a href="prescription.php?i='.$row['id'].'" class="button edit">View</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
