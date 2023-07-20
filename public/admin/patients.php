<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("admin");
$db = new DB();
?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <header>
            <h2>Patients</h2>
            <a href="newPatient.php" class="button edit">New</a>
        </header>
        
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
