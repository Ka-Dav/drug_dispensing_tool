<?php

require_once("./db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ssn = $_POST["ssn"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $yoe = $_POST["experience"];
    $address = $_POST["address"];
    $password = $_POST["password"];
}

$sqlResult = $db->insert("patients", array("ssn" => $ssn, "fname" =>$fName, "lname" =>$lName, "years_of_experience" =>$yoe, "address" =>$address, "password" =>$password));

if ($sqlResult["status"]) {
    echo "New record created successfully<br />";
    echo "<a href='../public/admin/patients.php'>Insert More Patients</a>";
} else {
    echo "Error: " . $sql . "<br>" . $sqlResult["data"];
}

?>