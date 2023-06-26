<?php
require_once("./db.php");
$db = new DB();
if (isset($_GET['s']) && $_GET['t']) {
    // Get the SSN from the query parameter
    $ssn = $_GET['s'];
    $option = $_GET['t'];
    $table;

    if($option == 'doctor'){
        $table = 'doctors';
    }
    else{
        $table = 'patients';
    }
    $whereStmt = 'SSN='.$ssn;
    $db->delete($table, $whereStmt);
    header("location: ../public/viewUsers.php");
} else {
    echo "Please provide the SSN.";
}
?>