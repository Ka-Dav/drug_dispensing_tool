<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("patient");

$db = new DB();
$id;

if (isset($_GET['i'])) {
    $id = $_GET['i'];
}

$where = "id = $id";
$data = $db->select("prescriptions",$where)["data"][0];

$where = "SSN = ".$data["doctor_ssn"];
$doctorDetails = $db->select("doctors",$where)["data"][0];

$where = "SSN = ".$data["dispensedBy"];
$pharmacistDetails = $db->select("pharmacists",$where)["data"][0];
?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Prescription</h1>
    <form>
        <label for="doctor_name">Doctor Name:</label>
        <input disabled type="text" name="ssn" value="<?php echo $doctorDetails['fname']." ".$doctorDetails['lname']; ?>"><br><br>

        <label for="drug_name">Drug Name:</label>
        <input disabled type="text" name="drug_name" value="<?php echo $data['drug_name']; ?>"><br><br>

        <label for="quantity">Quantity:</label>
        <input disabled type="text" name="quantity" value="<?php echo $data['quantity']; ?>"><br><br>

        <label for="frequency">Frequency:</label>
        <input disabled type="text" name="frequency" value="<?php echo $data['frequency']; ?>"><br><br>
        
        <label for="date">Date:</label>
        <input disabled type="datetime" name="date" value="<?php echo $data['date']; ?>"><br><br>

       <?php if($data['dispensed']): ?>
            <label for="dispensedBy">Dispensed By:</label>
            <input disabled type="text" name="dispensedBy" value="<?php echo $pharmacistDetails["lname"]." ".$pharmacistDetails["fname"]; ?>"><br><br>
        <?php else: ?>
            <label for="dispensed">dispensed:</label>
            <input disabled type="Text" name="dispensed" value="Pending"><br><br>
        <?php endif; ?>
    </form>
    </main>
</body>
</html>
