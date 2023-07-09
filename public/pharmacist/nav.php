<nav class="navbar">
        <div class="nav-logo">
            <span class="logo">LEGACY</span>
        </div>
        <div class="nav-links">
            <a href="index.php" class="active">Home</a> 
            <a href="#">Prescriptions</a>
            <a href="#">Dispense</a>
            <a href="drugs.php">Inventory</a>
        </div>
        <div class="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="button">Logout</a>
        </div>
    </nav>