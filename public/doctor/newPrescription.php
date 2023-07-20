<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("doctor");

$db = new DB();
$where = "primary_doctor = ".$login_session['SSN'];
$patients = $db->select("patients", $where)["data"];

$drugs = $db->select("drugs")["data"];
?>

<?php include 'header.php'; ?>
  <body>
    <?php include 'nav.php'; ?>
    <main>
      <h1>Prescription</h1>
    <form action="../../src/prescriptions.php" method="POST">
        <label for="patient_ssn">Patient:</label>
        <select name="patient_ssn" id="patient_ssn" required>
        <?php
            foreach($patients as $patient){
              $ssn = $patient["SSN"];
              $name = $patient["fname"]." ".$patient["lname"];
              echo "<option value='$ssn'>$name</option>";
            }
        ?>
        </select>
        <br/><br/>
      
        <label for="drug_name">Drug:</label>
        <select name="drug_name" id="drug_name" required>
        <?php
            foreach($drugs as $drug){
              $name = $drug["trade_name"];
              echo "<option value='$name'>$name</option>";
            }
        ?>
        </select>
        <br/><br/>
      
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" required><br><br>
      
      <label for="frequency">Frequency:</label>
      <input type="text" id="frequency" name="frequency" required><br><br>

      <input type="hidden" name="doctor_ssn" required value="<?php echo $login_session['SSN']; ?>"><br><br>
      <input type="hidden" id="date" name="date" value="<?php echo date("Y m d h:i");?>" required><br><br>
      <input type="hidden" name="method" value="new"/>
      
      <input type="submit" value="Prescribe">
    </form>
    </main>
  </body>
</html>