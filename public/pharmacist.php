<?php
   include('../src/session.php');
   checkRoute("pharmacist");
?>
<html>
    <head>
        <title>pharmacist</title>
    </head>
    <body>
        <h1>Pharmacist</h1>
        <h2>Welcome <?php echo $login_session["fname"]; ?></h2>
        <h2><a href ="..src/logout.php">Sign Out</a></h2>
    </body>
</html>