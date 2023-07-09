<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("patient");

$db = new DB();
$patient_ssn;
$doctor_ssn;

if (isset($_GET['d'])) {
    $patient_ssn = $login_session["SSN"];
    $doctor_ssn = $_GET['d'];
}

$where = "SSN = ".$doctor_ssn;
$doctorDetails = $db->select("doctors",$where)["data"][0];

$where = "patient_ssn=$patient_ssn AND doctor_ssn=$doctor_ssn";
$data = $db->select("prescriptions",$where)["data"][0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient</title>
    <link rel="stylesheet" href="../../assets/css/common.css"/>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Prescription</h1>
    <form>
        <label for="doctor_name">Doctor Name:</label>
        <input type="text" name="ssn" value="<?php echo $doctorDetails['fname']." ".$doctorDetails['lname']; ?>"><br><br>

        <label for="drug_name">Drug Name:</label>
        <input type="text" name="drug_name" value="<?php echo $data['drug_name']; ?>"><br><br>

        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>" required><br><br>
        
        <label for="date">Date:</label>
        <input type="datetime" name="date" value="<?php echo $data['date']; ?>" required><br><br>

        <label for="dispensed">dispensed:</label>
        <input type="Text" name="dispensed" value="<?php echo $data['dispensed']?'True':'False'; ?>" required><br><br>
    </form>
    </main>
</body>
</html>
