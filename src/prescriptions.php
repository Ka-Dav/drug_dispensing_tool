<?php
require_once("db.php");

$db = new DB();


if ($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($_GET['p']) && isset($_GET['d'])) {
        // Get the SSN from the query parameter
        $patient_ssn = $_GET['p'];
        $doctor_ssn = $_GET['d'];
        $whereStmt = "patient_ssn='$patient_ssn' AND doctor_ssn='$doctor_ssn'";
        $db->delete("prescriptions", $whereStmt);
        header("location: ../public/doctor/index.php");
    } else {
        echo "Please provide the SSNs.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // if($_POST['method'] == "edit"){
    //     // Retrieve the edited data from the form
    //     $editedData = [
    //         'trade_name' => $_POST['trade_name'],
    //         'formula' => $_POST['formula'],
    //         'description' => $_POST['description'],
    //         'weight' => $_POST['weight'],
    //         'drug_usage' => $_POST['drug_usage'],   
    //         'manufacturer_name' => $_POST['manufacturer_name'],
    //     ];
    //     $table = "drugs";
    //     $where = 'trade_name ="'.$_POST['trade_name'].'"';
    //     $result =  $db->update($table, $editedData, $where);

    //     if ($result["status"] == TRUE) {
    //         echo "Data updated successfully!";
    //         header("location: ../public/pharmacist/drugs.php");
    //     } else {
    //         echo "Error updating data: " . $result["data"];
    //     }
    // }
    if($_POST['method'] == "new"){
        $newData = [
            'patient_ssn' => $_POST['patient_ssn'],
            'doctor_ssn' => $_POST['doctor_ssn'],
            'drug_name' => $_POST['drug_name'],
            'quantity' => $_POST['quantity'],
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