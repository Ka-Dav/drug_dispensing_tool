<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("admin");

$db = new DB();
$ssn;
$table = "patients";

if (isset($_GET['s'])) {
    $ssn = $_GET['s'];
}

$where = "SSN=".$ssn;
$data = $db->select($table,$where)["data"][0];

$doctors = $db->select("doctors")["data"];

// Handle form submission
?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Edit Data</h1>
        <form method="POST" action="../../src/patients.php">
            <label for="ssn">SSN:</label>
            <input type="text" name="ssn" value="<?php echo $data['SSN']; ?>"><br><br>
    
            <label for="fname">First Name:</label>
            <input type="text" name="fname" value="<?php echo $data['fname']; ?>" required><br><br>
    
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $data['lname']; ?>" required><br><br>
            
            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $data['address']; ?>" required><br><br>
            
            <label for="dob">Date Of Birth:</label>
            <input type="date" name="dob" value="<?php echo $data['dob']; ?>" required><br><br>

            <label for="doctor">Primary Doctor:</label>
            <select name="doctor" id="doctor" required>
                <?php
                    foreach($doctors as $doctor){
                        $name = $doctor["fname"] . " " . $doctor["lname"];
                        $ssn = $doctor["SSN"];
                        if($ssn == $data["primary_name"]){
                            echo "<option value='$ssn' selected>$name</option>";
                        }
                        else {
                            echo "<option value='$ssn'>$name</option>";
                        }      
                    }
                ?>
            </select>
    
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $data['password']; ?>" required><br><br>
    
            <input type="hidden" name="op" value="edit" />

            <input type="submit" value="submit">
        </form>
    </main>
</body>
</html>
