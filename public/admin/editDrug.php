<?php
require_once("../../src/db.php");
include('../../src/session.php');
checkRoute("admin");

$db = new DB();
$trade_name;
$table = "drugs";

if (isset($_GET['s'])) {
    $trade_name = $_GET['s'];
}

$where = 'trade_name="'.$trade_name.'"';
$data = $db->select($table,$where)["data"][0];

$companies = $db->select("pharmaceutical_companies")["data"];
?>

<?php include 'header.php'; ?>
    <?php include 'nav.php'; ?>
    <main>
        <h1>Edit Data</h1>
        <form method="POST" action="../../src/drugs.php">
            <label for="trade_name">Trade Name:</label>
            <input type="text" name="trade_name" readonly value="<?php echo $data['trade_name']; ?>"><br><br>

            <label for="formula">Formula:</label>
            <input type="text" name="formula" value="<?php echo $data['formula']; ?>" required><br><br>

            <label for="description">Description:</label>
            <textarea name="description" required>
                <?php echo $data['description']; ?>
            </textarea><br/><br/>
            
            <label for="weight">Weight:</label>
            <input type="text" name="weight" value="<?php echo $data['weight']; ?>" required><br/><br/>
            
            <label for="drug_usage">Drug Usage:</label>
            <textarea name="drug_usage" required>
                <?php echo $data['drug_usage']; ?>
            </textarea><br/><br/>

            <label for="manufacturer_name">Manufacturer Name:</label>
            <select name="manufacturer_name" id="manufacturer_name" required>
            <?php
                foreach($companies as $company){
                    $name = $company["name"];
                    
                    if ($name == $data["manufacturer_name"]){
                        echo "<option value='$name' selected>$name</option>";
                    }
                    else {
                        echo "<option value='$name'>$name</option>";
                    }
                }
            ?>
            </select>
            
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $data['price']; ?>" required><br/><br/>

            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>" required><br/><br/>
            
            <input hidden name="method" value="edit"/>
            <input type="submit" value="submit">
        </form>
    </main>
    
</body>
</html>
