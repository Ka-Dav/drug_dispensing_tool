<?php
require_once("db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'trade_name' => $_POST['trade_name'],
        'formula' => $_POST['formula'],
        'description' => $_POST['description'],
        'weight' => $_POST['weight'],
        'drug_usage' => $_POST['drug_usage'],   
        'manufacturer_name' => $_POST['manufacturer_name'],
        'quantity' => $_POST['quantity'],
        'price' => $_POST['price'],
    ];

    $method = $_POST['method'];
    $result;

    if($method == "edit"){
        $where = 'trade_name ="'.$_POST['trade_name'].'"';
        $result =  $db->update("drugs", $data, $where);
    }
    else if ($method == "new"){
        $result = $db->insert("drugs", $data);
    }
    
    if ($result["status"] == TRUE) {
        echo "Data updated successfully!";
        header("location: ../public/admin/drugs.php");
    } else {
        echo "Error updating data: " . $result["data"];
    } 
}
?>