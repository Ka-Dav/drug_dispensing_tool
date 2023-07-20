<?php 
require_once("../../src/db.php"); 
include('../../src/session.php');
checkRoute("patient");
$db = new DB();
?>

<?php include 'header.php'; ?>
<body>
  <?php include 'nav.php'; ?>
  <main>
    <div class="user-details">
      <div class="image">
        <img src="../../assets/images/user.png" alt="User Photo" style="width: 150px; height: 150px; border-radius: 50%;">
      </div>
  
      <div class="details">
        <h2>User Details</h2>
        <div>
          <?php
            // Fetch user details from PHP
            $details = [
            "SSN" => $login_session["SSN"],
            "First Name" => $login_session["fname"],
            "Last Name" => $login_session["lname"],
            "Role" => $login_session["role"]
            ];
            foreach($details as $name => $value){
              echo "<div class='detail'>";
              echo "<span class='label'>$name</span>";
              echo "<span class='value'>$value</span>";
              echo "</div>";
            }
          ?>
        </div>
      </div>
    </div>
  </main>
</body>
</html>