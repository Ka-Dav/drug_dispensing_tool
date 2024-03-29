<?php 
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("admin");

$db = new DB();
$ssn;
$option;
$table;

if (isset($_GET['s'])) {
    $ssn = $_GET['s'];
}

$table = 'doctors';

$where = "SSN=".$ssn;
$data = $db->select($table,$where)["data"][0];

?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Edit Doctor</h1>
        <form method="POST" action="../../src/doctors.php">
            <input type="hidden" name="ssn" value="<?php echo $data['SSN']; ?>"><br><br>
    
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
    
            <input type="hidden" name="op" value="edit" />
    
            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>
