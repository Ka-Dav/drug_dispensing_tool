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
            <h2>Suppliers</h2>
            <button class="button edit">New</button>
        </header>
        
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
            echo "<td>".$row['name']??''."</td>";
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
