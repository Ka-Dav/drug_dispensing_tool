<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("pharmacist");
$db = new DB();
$prescriptions = [];
$id = $login_session["SSN"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ssn = $_POST['ssn'];
    $where = "patient_ssn = $ssn AND dispensedBy=$id";
    $prescriptions = $db->select('prescriptions', $where)["data"];
}
else{
    $where = "dispensedBy= $id";
    $prescriptions = $db->select("prescriptions", $where)["data"];
}
?>

<?php include 'header.php'; ?>
<body>
<?php include 'nav.php'; ?>
    <main>
        <h2>Prescriptions</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="search">Search: </label>
            <input type="text" name="ssn" placeholder="patient ssn">
            <input type="submit" value="Search" class="button edit"/>
        </form>
    
    <table>
        <tr>
            <th>Patient SSN</th>
            <th>Drug Name</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($prescriptions as $row) {
            echo '<tr>';
            echo "<td>".$row['patient_ssn']??''."</td>";
            echo "<td>".$row['drug_name']??''."</td>";
            echo "<td>".$row['quantity']??'' ."</td>";
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
