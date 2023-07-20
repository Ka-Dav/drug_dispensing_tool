<?php

require_once("./db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [
        'SSN' => $_POST['ssn'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'address' => $_POST['address'],
        'password' => $_POST['password'],
    ];

    $option = $_POST['op'];
    $sqlResult;

    if($option == "new"){
        $sqlResult = $db->insert("admins", $data);
    }
    else if($option == "edit"){
        $where = "ssn =".$data["SSN"];
        $result =  $db->update("admins", $data, $where);
    }
    

    if ($sqlResult["status"]) {
        echo "New record created successfully<br />";
         header('location:../public/admin/admins.php');
    } else {
        echo "Error: " . $sql . "<br>" . $sqlResult["data"];
    }
}


?>