<?php

require_once("./db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ssn = $_POST["ssn"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $age = $_POST["age"];
    $address = $_POST["address"];
}

$sqlResult = $db->insert("patients", array("ssn" => $ssn, "fname" =>$fName, "lname" =>$lName, "age" =>$age, "address" =>$address));

if ($sqlResult["status"]) {
    echo "New record created successfully<br />";
    echo "<a href='../public/patientForm.php'>Insert More Patients</a>";
} else {
    echo "Error: " . $sql . "<br>" . $sqlResult["message"];
}

?>