<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("admin");

$db = new DB();
$ssn;
$table = "admins";

if (isset($_GET['s'])) {
    $ssn = $_GET['s'];
}

$where = "SSN=".$ssn;
$data = $db->select($table,$where)["data"][0];

// Handle form submission
?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Edit Data</h1>
        <form method="POST" action="../../src/admins.php">
            <label for="ssn">SSN:</label>
            <input type="text" name="ssn" value="<?php echo $data['SSN']; ?>"><br><br>
    
            <label for="fname">First Name:</label>
            <input type="text" name="fname" value="<?php echo $data['fname']; ?>" required><br><br>
    
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $data['lname']; ?>" required><br><br>
            
            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $data['address']; ?>" required><br><br>
    
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $data['password']; ?>" required><br><br>
    
            <input type="hidden" name="op" value="edit" />

            <input type="submit" value="submit">
        </form>
    </main>
</body>
</html>
