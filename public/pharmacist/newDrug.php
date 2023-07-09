<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("pharmacist");

$db = new DB();
$companies = $db->select("pharmaceutical_companies")["data"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Drugs</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include 'nav.php'; ?>
    <main>
      <h1>New Drug Form</h1>
    <form action="../../src/drugs.php" method="POST">
      <label for="trade_name">Trade Name:</label>
      <input type="text" name="trade_name" required/><br/><br/>

        <label for="formula">Formula:</label>
        <input type="text" name="formula" required/><br/><br/>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br/><br/>
        
        <label for="weight">Weight:</label>
        <input type="text" name="weight" required/><br/><br/>
        
        <label for="drug_usage">Drug Usage:</label>
        <textarea name="drug_usage" required></textarea><br/><br/>

        <label for="manufacturer_name">Manufacturer Name:</label>
        <select name="manufacturer_name" id="manufacturer_name" required>
        <?php
            foreach($companies as $company){
              $name = $company["name"];
              echo "<option value='$name'>$name</option>";
            }
        ?>
        </select>
        <br/><br/>
        <label for="price">Price:</label>
        <input type="text" name="price" required><br/><br/>
        <input type="hidden" name="method" value="new"/>
        <input type="submit" value="Submit">
    </form>
    </main>
    
  </body>
</html>