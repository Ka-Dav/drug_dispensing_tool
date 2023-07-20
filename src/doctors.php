<?php

require_once("./db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'SSN' => $_POST['ssn'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'years_of_experience' => $_POST['experience'],
        'address' => $_POST['address'],
        'speciality' => $_POST['speciality'],
        'password' => $_POST['password'],
    ];
    $option = $_POST["op"];
    $result;
    if($option == "edit"){
       $where = "ssn =".$data['SSN'];
       $result =  $db->update("doctors", $data, $where);
    }
    elseif($option == "new"){
        $result = $db->insert("doctors", $data);
    }

    if ($result["status"]) {
        echo "successful";
        header('location:../public/admin/doctors.php');
    } else {
        echo "Error: " . $sql . "<br>" . $result["data"];
    }
}



?>