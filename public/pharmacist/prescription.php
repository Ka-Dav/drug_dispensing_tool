<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("pharmacist");

$db = new DB();
$id;
$pharmacistDetails;

if (isset($_GET['i'])) {
    $id = $_GET['i'];
}

$where = "id = $id";
$data = $db->select("prescriptions",$where)["data"][0];

$where = "SSN = ".$data["patient_ssn"];
$patientDetails = $db->select("patients",$where)["data"][0];

$where = "SSN = ".$data["doctor_ssn"];
$doctorDetails = $db->select("doctors",$where)["data"][0];

$where = "trade_name='".$data["drug_name"]."'";
$drugDetails = $db->select("drugs",$where)["data"][0];

if($data["dispensed"]){
    $where = "SSN = ".$data["dispensedBy"];
    $pharmacistDetails = $db->select("pharmacists",$where)["data"][0];
}

?>

<?php include 'header.php'; ?>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Prescription</h1>
        <form action="../../src/dispense.php" method="POST">
            <label for="patient_name">Patient Name:</label>
            <input disabled type="text" name="patient_name" id="patient_name" value="<?php echo $patientDetails['fname']." ".$patientDetails['lname']; ?>"><br><br>

            <label for="patient_dob">Patient Date of birth:</label>
            <input disabled type="text" name="patient_dob" id="patient_dob" value="<?php echo $patientDetails['dob']; ?>"><br><br>

            <label for="doctor_name">Doctor Name:</label>
            <input disabled type="text" name="doctor_name" id="doctor_name" value="<?php echo $doctorDetails['fname']." ".$doctorDetails['lname']; ?>"><br><br>

            <label for="trade_name">Drug Name:</label>
            <input disabled type="text" name="trade_name" value="<?php echo $data['drug_name']; ?>"><br><br>

            <label for="formula">Formula:</label>
            <input disabled type="text" name="formula" value="<?php echo $drugDetails['formula']; ?>" ><br><br>

            <label for="description">Description:</label>
            <textarea disabled name="description" >
                <?php echo $drugDetails['description']; ?>
            </textarea><br/><br/>
            
            <label for="weight">Drug Weight:</label>
            <input disabled type="text" name="weight" value="<?php echo $drugDetails['weight']; ?>" ><br/><br/>
            
            <label for="drug_usage">Drug Usage:</label>
            <textarea disabled name="drug_usage" >
                <?php echo $drugDetails['drug_usage']; ?>
            </textarea><br/><br/>

            <label for="trade_name">Doctor recommended Frequency:</label>
            <input disabled type="text" name="frequency" value="<?php echo $data['frequency']; ?>"><br><br>

            <label for="date">Date:</label>
            <input disabled type="datetime" name="date" value="<?php echo $data['date']; ?>" ><br><br>

            <?php if($data['dispensed']): ?>
                <label for="dispensedBy">Dispensed By:</label>
                <input disabled type="text" name="dispensedBy" value="<?php echo $pharmacistDetails["lname"]." ".$pharmacistDetails["fname"]; ?>" ><br><br>
            <?php elseif($data['quantity']>$drugDetails["quantity"]): ?>
                 <p class="error">Out of stock</p>
            <?php else: ?>
                <label for="quantity">Quantity:</label>
                <input disabled type="text" name="quantity" value="<?php echo $data['quantity']; ?>" ><br><br>
                <label for="price">Price:</label>
                <input disabled type="text" name="price" value="<?php echo $drugDetails['price']; ?>" ><br><br>
                <label for="totalPrice">Total Price:</label>
                <input disabled type="text" name="totalPrice" value="<?php echo ($drugDetails["price"]*$data["quantity"]); ?>" ><br><br>
                <input type="hidden" name="stock" value="<?php echo $drugDetails['quantity']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                <input type="hidden" name="ssn" value="<?php echo $login_session['SSN']; ?>"/>
                <input type="submit" value="Dispense" class="button"/>
            <?php endif; ?>
        </form>
    </main>
</body>
</html>
