<?php
require_once("db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $quantity =   $_POST['quantity'];
        $stock = $_POST['stock'];
        $id = $_POST['id'];
        $ssn = $_POST['ssn'];
        $newStock = $stock - $quantity;

        $editedData = [
            'quantity' => $newStock,
        ];
        
        $table = "drugs";
        $where = 'trade_name ="'.$_POST['trade_name'].'"';
        $result =  $db->update($table, $editedData, $where);

        if ($result["status"]) {
        $where = "id = $id";
        $result =  $db->update("prescriptions", array("dispensed"=>1, "dispensedBy"=>$ssn), $where);

            header("location: ../public/pharmacist/dispense.php");
        } else {
            echo "Error: " . $sql . "<br>" . $sqlResult["data"];
        }
    }
?>