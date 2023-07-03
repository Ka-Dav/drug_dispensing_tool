<?php
require_once("db.php");

$db = new DB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST['method'] == "edit"){
        // Retrieve the edited data from the form
        $editedData = [
            'trade_name' => $_POST['trade_name'],
            'formula' => $_POST['formula'],
            'description' => $_POST['description'],
            'weight' => $_POST['weight'],
            'drug_usage' => $_POST['drug_usage'],   
            'manufacturer_name' => $_POST['manufacturer_name'],
        ];
        $table = "drugs";
        $where = 'trade_name ="'.$_POST['trade_name'].'"';
        $result =  $db->update($table, $editedData, $where);

        if ($result["status"] == TRUE) {
            echo "Data updated successfully!";
            header("location: ../public/pharmacist/drugs.php");
        } else {
            echo "Error updating data: " . $result["data"];
        }
    }
    if($_POST['method'] == "new"){
        $newData = [
            'trade_name' => $_POST['trade_name'],
            'formula' => $_POST['formula'],
            'description' => $_POST['description'],
            'weight' => $_POST['weight'],
            'drug_usage' => $_POST['drug_usage'],   
            'manufacturer_name' => $_POST['manufacturer_name'],
            'price' => $_POST['price'],
        ];

        $sqlResult = $db->insert("drugs", $newData);

        if ($sqlResult["status"]) {
            header("location: ../public/pharmacist/drugs.php");
        } else {
            echo "Error: " . $sql . "<br>" . $sqlResult["data"];
        }
    }
    
}
?>