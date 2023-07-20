<?php 
require_once("../src/db.php"); 
include('../src/session.php');
$db = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>LEGACY</title>
    <link rel="stylesheet" href="../assets/css/styles.css"/>
    <link rel="stylesheet" href="../assets/css/index.css"/>
</head>
<body>
    <div class="navbar">
        <div class="nav-logo">
            <span class="logo">LEGACY</span>
        </div>
        <div class="nav-links">
            <a href="#hero">Home</a> 
            <a href="#partners">Partners</a>
            <a href="#benefits">Benefits</a>
            <!-- <a href="#testimonials">Testimonials</a> -->
        </div>
        <?php 
            if(count($login_session) > 0){
                $url = "./".$login_session["role"]."/index.php";
                echo '<a class="nav-info" href="'.$url.'">';
                echo '<img src="../../assets/images/user.png" alt="User Photo" width="20" height="20" class="image">';
                echo '<div class="name">'.$login_session["fname"].'</div>';
                echo '</a>';
            }
            else{
                echo "<a href='./auth/login.php' class='btn'>Login</a>";
            }
        ?>
    </div>

    <main>
        <section class="section section__hero" id="hero">
            <div class="content">
                <h1 class="headline">Effortlessly Manage Your Medication</h1>
                <p class="sub-headline">Introducing Legacy, the innovative medicine dispensing tool designed to simplify your daily medication routine. Say goodbye to the hassle of organizing and remembering your pills. With Legacy, you can easily manage your medication schedule, ensuring you never miss a dose again.</p>
                <a href="#benefits" class="btn btn-login">More Details</a>
            </div>
            <div class="illustration">
                <img src="../assets/images/health.png" alt=""/>
            </div>
            
        </section>

        <div class="section section__affiliations" id="partners">
            <header class="header">
                <h2 class="title">Our Affiliations</h2>
                <div class="underline"></div>
                <p class="subline">We are proud to partner with leading healthcare organizations and pharmacies to bring you the best possible medication management experience.<br/> Our esteemed partners include:</p>
            </header>
            <div class="content">
                <div class="logo">
                    <img src="../assets/images/astrazeneca.svg" alt="astrazeneca" />
                </div>
                <div class="logo">
                    <img src="../assets/images/goodlife.svg" alt="goodlife" />
                </div>
                <div class="logo">
                    <img src="../assets/images/mydawa.png" alt="mydawa" />
                </div>
                <div class="logo">
                    <img src="../assets/images/roche.svg" alt="roche" />
                </div>
            </div>  
        </div>

        <section class="section section__benefits" id="benefits">
            <header class="header">
                <h2 class="title">Key Benefits</h2>
                <div class="underline"></div>
            </header>
            <div class="benefits">  
                <div class="benefit">
                    <div class="content">
                        <h3 class="title">Smart Dispensing Technology</h3>
                        <p class="description">
                            Our cutting-edge dispenser accurately measures and dispenses your medications with precision. Say goodbye to manual pill counting and sorting.
                        </p>
                    </div>
                    <div class="illustration">
                        <img src="../assets/images/blob.png" alt="" class="blob">
                        <img src="../assets/images/Medical prescription.svg" alt="" class="image">
                    </div>
                </div>
                <div class="benefit">
                    <div class="content">
                        <h3 class="title">User-Friendly Web App</h3>
                        <p class="description">
                            Access your medication schedule, set reminders, and manage your prescriptions with our user-friendly web app, Stay connected to your medication routine wherever you go.
                        </p>
                    </div>
                    <div class="illustration">
                        <img src="../assets/images/blob.png" alt="" class="blob">
                        <img src="../assets/images/connected.svg" alt="" class="image">
                    </div>
                </div>
                <div class="benefit">
                    <div class="content">
                        <h3 class="title">Secure Medication Dispensing</h3>
                        <p class="description">
                            Legacy ensures the safety of your medications with a lockable account,  protecting them from unauthorized access and tampering. Rest easy knowing that your medication is stored securely.
                        </p>
                    </div>
                    <div class="illustration">
                        <img src="../assets/images/blob.png" alt="" class="blob">
                        <img src="../assets/images/Safe.svg" alt="" class="image">
                    </div>
                </div>
                <div class="benefit">
                    <div class="content">
                        <h3 class="title">Medication History and Reporting</h3>
                        <p class="description">
                            We keep a detailed record of your medication intake, helping you monitor your adherence and share accurate information with healthcare providers. Stay on top of your health and make informed decisions.
                        </p>
                    </div>
                    <div class="illustration">
                        <img src="../assets/images/blob.png" alt="" class="blob">
                        <img src="../assets/images/dashboard.svg" alt="" class="image">
                    </div>
                </div>
                <div class="benefit">
                    <div class="content">
                        <h3 class="title">Pharmacist Integration</h3>
                        <p class="description">
                            Your profile is connected to your preferred pharmacy or healthcare provider to simplify prescription refills and receive personalized medication guidance from licensed pharmacists.
                        </p>
                    </div>
                    <div class="illustration">
                        <img src="../assets/images/blob.png" alt="" class="blob">
                        <img src="../assets/images/Pharmacist.svg" alt="" class="image">
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="section section__testimonial" id="testimonials">
            <header class="header">
                <h2 class="title">What our clients say</h2>
                <div class="underline"></div>
            </header>
        </section> -->
    </main>
    <footer class="footer">
        <div class="brand">
            <span class="logo">LEGACY</span>
            <span class="tag">Remember, your health matters, and Legacy is here to support you every step of the way.</span>
        </div>
        <div class="links">
            <h3>Quick Links</h3>
            <div class="items">
            <a href="#hero">Home</a> 
            <a href="#partners">Partners</a>
            <a href="#benefits">Benefits</a>
            </div>
            
        </div>

        <div class="rights">
            <span class="item">David&Joseph@2023</span>
            <a href="https://storyset.com/people" class="item">Illustrations by Storyset</a>
        </div>
    </footer>
</body>
</html>