<?php 
require("../../src/db.php"); 
include('../../src/session.php');
checkRoute("pharmacist");
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Drugs</title>
    <link rel="stylesheet" href="../../assets/css/common.css"/>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h2>Inventory</h2>
        <a href="newDrug.php" class="button edit">New</a>
    <table>
        <tr>
            <th>Trade Name</th>
            <th>Formula</th>
            <th>Weight</th>
            <th>Manufacturer Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        $data = $db->select("drugs")["data"];
        // Generate table rows with data and buttons
        foreach ($data as $row) {
            echo '<tr>';
            echo "<td>".$row['trade_name']??''."</td>";
            echo "<td>".$row['formula']??'' ."</td>";
            echo "<td>".$row['weight']??'' ."</td>";
            echo "<td>".$row['manufacturer_name']??'' ."</td>";
            echo "<td>".$row['price']??'' ."</td>";
            echo '<td>';
            echo '<a href="editDrug.php?s='.$row['trade_name']. '" class="button edit">Edit</a>';
            echo '<a href="../../src/handleDelete.php?s='.$row['trade_name'].'&t=drugs" class="button delete">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </main>
</body>
</html>
