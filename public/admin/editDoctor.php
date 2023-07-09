<?php
require_once("../src/db.php");

$db = new DB();
$ssn;
$option;
$table;

if (isset($_GET['s'])) {
    $ssn = $_GET['s'];
}

$table = 'doctors';

$where = "SSN=".$ssn;
echo $where;
$data = $db->select($table,$where)["data"][0];

// Handle form submission
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Edit Data</h1>
        <form method="POST" action="../../src/handleUpdate.php">
            <input type="hidden" name="ssn" value="<?php echo $data['SSN']; ?>" disabled><br><br>
    
            <label for="fname">First Name:</label>
            <input type="text" name="fname" value="<?php echo $data['fname']; ?>" required><br><br>
    
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $data['lname']; ?>" required><br><br>
            
            <label for="speciality">Speciality:</label>
            <input type="text" name="speciality" value="<?php echo $data['speciality']; ?>" required><br><br>
    
           <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $data['address']; ?>" required><br><br>
    
            <label for="experience">Years of Experience:</label>
            <input type="number" name="experience" value="<?php echo $data['years_of_experience']; ?>" required><br><br>
    
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $data['password']; ?>" required><br><br>
    
            <input type="hidden" name="option" value="doctor" />
    
            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>
