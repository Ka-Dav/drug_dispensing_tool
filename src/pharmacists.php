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
        $sqlResult = $db->insert("pharmacists", $data);
    }
    else if($option == "edit"){
        $where = "ssn =".$data["SSN"];
        $result =  $db->update("pharmacists", $data, $where);
    }
    

    if ($sqlResult["status"]) {
        header('location:../public/admin/pharmacists.php');
    } else {
        echo "Error: " . $sql . "<br>" . $sqlResult["data"];
    }
}


?>