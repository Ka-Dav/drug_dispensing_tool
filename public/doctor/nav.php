 <nav class="navbar">
        <div class="nav-logo">
            <span class="logo">LEGACY</span>
        </div>
        <div class="nav-links">
            <a href="index.php" class="active">Home</a> 
            <a href="patients.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
        </div>
        <div class="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="button edit">Logout</a>
        </div>
    </nav>