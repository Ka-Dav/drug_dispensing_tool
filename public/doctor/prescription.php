<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("doctor");

$db = new DB();
$patient_ssn;
$id;

if (isset($_GET['i'])) {
    $id=$_GET['i'];
}

$where = "id = $id";
$data = $db->select("prescriptions",$where)["data"][0];

$patient_ssn = $data['patient_ssn'];
$doctor_ssn = $login_session["SSN"];

$where = "SSN = ".$patient_ssn;
$patientDetails = $db->select("patients",$where)["data"][0];
?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Prescription</h1>
        <form>
            <label for="patient_name">Patient Name:</label>
            <input disabled id="patient_name" type="text" name="patient_name" value="<?php echo $patientDetails['fname']." ".$patientDetails['lname']; ?>"><br><br>
    
            <label for="patient_dob">Patient Date of birth:</label>
            <input disabled type="text" name="patient_dob" id="patient_dob" value="<?php echo $patientDetails['dob']; ?>"><br><br>
    
            <label for="drug_name">Drug Name:</label>
            <input disabled type="text" name="drug_name" value="<?php echo $data['drug_name']; ?>"><br><br>
    
            <label for="quantity">Quantity:</label>
            <input disabled type="text" name="quantity" value="<?php echo $data['quantity']; ?>" required><br><br>
            
            <label for="quantity">Frequency:</label>
            <input disabled type="text" name="frequency" value="<?php echo $data['frequency']; ?>" required><br><br>

            <label for="date">Date:</label>
            <input disabled type="datetime" name="date" value="<?php echo $data['date']; ?>" required><br><br>
    
            <label for="dispensed">Status:</label>
            <input disabled type="Text" name="dispensed" value="<?php echo $data['dispensed']?'Dispensed':'Pending'; ?>" required><br><br>
        </form>
    </main>
</body>
</html>
