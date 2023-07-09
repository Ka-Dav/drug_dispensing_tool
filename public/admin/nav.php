    <nav class="navbar">
        <div class="nav-logo">
            <span class="logo">LEGACY</span>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a> 
            <a href="patients.php" class="active">Patients</a>
            <a href="doctors.php">Doctors</a>
            <a href="contracts.php">Contracts</a>
        </div>
        <div class="nav-info">
            <span><?php echo $login_session["fname"];?></span>
            <img src="../../assets/images/user.png" alt="User Photo" width="20" height="20">
            <a href="../../src/logout.php" class="btn delete">Logout</a>
        </div>
    </nav>