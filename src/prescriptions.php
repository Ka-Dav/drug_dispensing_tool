<?php
require_once("db.php");

$db = new DB();


if ($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($_GET['i'])) {
        // Get the SSN from the query parameter
        $id = $_GET['i'];
        $whereStmt = "id=$id";
        $db->delete("prescriptions", $whereStmt);
        header("location: ../public/doctor/index.php");
    } else {
        echo "Please provide the SSNs.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $db->getId("prescriptions", "id");

    if($_POST['method'] == "new"){
        $newData = [
            'id' => $id,
            'patient_ssn' => $_POST['patient_ssn'],
            'doctor_ssn' => $_POST['doctor_ssn'],
            'drug_name' => $_POST['drug_name'],
            'quantity' => $_POST['quantity'],
            'frequency' => $_POST['frequency'],
            'date' => $_POST['date'],   
        ];

        $sqlResult = $db->insert("prescriptions", $newData);

        if ($sqlResult["status"]) {
            header("location: ../public/doctor/prescriptions.php");
        } else {
            echo "Error: " . $sql . "<br>" . $sqlResult["data"];
        }
    }
}
?>