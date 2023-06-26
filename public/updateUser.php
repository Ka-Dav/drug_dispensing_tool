<?php
require_once("../src/db.php");

$db = new DB();
$ssn;
$option;
$table;
if (isset($_GET['s']) && $_GET['t']) {
    // Get the SSN from the query parameter
    $ssn = $_GET['s'];
    $option = $_GET['t'];
}
 if($option == 'doctor'){
        $table = 'doctors';
    }
    else{
        $table = 'patients';
    }
$where = "SSN=".$ssn;

$data = $db->select($table,$where)["message"];;


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the edited data from the form
    $editedData;
    if($option == 'doctor'){
    $editedData = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'years_of_experience' => $_POST['experience'],
        'speciality' => $_POST['speciality'],
        'password' => $_POST['password'],
    ];
    }
    else{
         $editedData = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'age' => $_POST['age'],
        'address' => $_POST['address'],
        'password' => $_POST['password'],
    ];
    }

    $result =  $db->update($table, $editedData, $where);

    if ($result["status"] == TRUE) {
        echo "Data updated successfully!";
        header("location: viewUsers.php");
    } else {
        echo "Error updating data: " . $result["message"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="ssn">SSN:</label>
        <input type="text" name="ssn" value="<?php echo $data['ssn']; ?>" disabled><br><br>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $data['fname']; ?>" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $data['lname']; ?>" required><br><br>
        
        <?php if ($option === 'doctor') : ?>
        <label for="speciality">Speciality:</label>
        <input type="text" name="speciality" value="<?php echo $data['speciality']; ?>" required><br><br>
        <?php else : ?>
       <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $data['address']; ?>" required><br><br>
        <?php endif; ?>
        

       <?php if ($option === 'doctor') : ?>
        <label for="experience">Years of Experience:</label>
        <input type="number" name="experience" value="<?php echo $data['years_of_experience']; ?>" required><br><br>
        <?php else : ?>
        <label for="age">Age:</label>
        <input type="number" name="age" value="<?php echo $data['age']; ?>" required><br><br>
        <?php endif; ?>

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $data['password']; ?>" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
