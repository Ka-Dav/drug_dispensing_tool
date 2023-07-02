<?php
require_once("db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the edited data from the form
    $editedData;
    print_r($_POST);
    if($_POST['option'] == 'doctor'){
        $editedData = [
            'SSN' => $_POST['ssn'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'years_of_experience' => $_POST['experience'],
            'address' => $_POST['address'],
            'speciality' => $_POST['speciality'],
            'password' => $_POST['password'],
        ];
        $table = "doctors";
    }
    else{
        $editedData = [
            'SSN' => $_POST['ssn'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'dob' => $_POST['dob'],
            'address' => $_POST['address'],
            'password' => $_POST['password'],
        ];
        $table = "patients";
    }
    $where = "ssn =".$_POST['ssn'];
    $result =  $db->update($table, $editedData, $where);

    if ($result["status"] == TRUE) {
        echo "Data updated successfully!";
        header("location: ../public/admin/index.php");
    } else {
        echo "Error updating data: " . $result["data"];
    }
}
?>