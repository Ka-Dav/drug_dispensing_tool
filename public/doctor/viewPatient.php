<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("doctor");

$db = new DB();
$ssn;
$table = "patients";

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
        <h1>Patient</h1>
            <label for="ssn">SSN:</label>
            <input type="text" disabled name="ssn" value="<?php echo $data['SSN']; ?>"><br><br>
    
            <label for="fname">First Name:</label>
            <input type="text" disabled name="fname" value="<?php echo $data['fname']; ?>" required><br><br>
    
            <label for="lname">Last Name:</label>
            <input type="text" disabled ="lname" value="<?php echo $data['lname']; ?>" required><br><br>
            
            <label for="dob">Date Of Birth:</label>
            <input type="date" disabled name="dob" value="<?php echo $data['dob']; ?>" required><br><br>
    </main>
</body>
</html>
