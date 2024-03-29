<?php

require_once("./db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [
        'SSN' => $_POST['ssn'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'dob' => $_POST['dob'],
        'primary_doctor' => $_POST['doctor'],
        'address' => $_POST['address'],
        'password' => $_POST['password'],
    ];

    $option = $_POST['op'];
    $sqlResult;

    if($option == "new"){
        $sqlResult = $db->insert("patients", $data);
    }
    else if($option == "edit"){
        $where = "ssn =".$data["SSN"];
        $sqlResult =  $db->update("patients", $data, $where);
    }
    

    if ($sqlResult["status"]) {
        echo "New record created successfully<br />";
        header('location:../public/admin/patients.php');
    } else {
        echo "Error: " . $sql . "<br>" . $sqlResult["data"];
    }
}


?>