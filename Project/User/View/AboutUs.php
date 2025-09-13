<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About This Page</title>
        <link rel="stylesheet" href="../CSS/AboutUS.css">
    </head>
    <body>
        <header>
           <p>Your Safety,Our Priority</p>
        </header>
        <div class="about-content">
        <h2>Our Mission</h2>
        <p>We aim to create a safer world for women by empowering them with technology, resources, and awareness.</p>
        <h2>Who We Are</h2>
        <p>We are a team of dedicated individuals committed to women's safety, gender equality, and social justice. Our platform provides safety tips, emergency contact features, and educational content to support women in vulnerable situations.</p>
        <h2>What We Do</h2>
        <ul>
            <li>Provide real-time safety tools</li>
            <li>Offer self-defense resources</li>
            <li>Promote awareness and education</li>
            <li>Connect women to emergency services</li>
        </ul>
        <h2>Meet the Team</h2>
        <div class="team">
               <p><strong>Anindita Bhattacharjee</strong><br>Founder & Project Lead</p>
               <p><strong>Tasnova Tabassum</strong><br>Co-Founder</p>
               <p><strong>Aklima Akhter Ani</strong><br>Assistant Manager</p>
               <p><strong>Maharin Esha</strong><br>Security System Manager</p>    
        </div>
        <div class="member">
               <p><strong>Fariha Arpa</strong><br>Fronted Developer</p>
               <p><strong>Monisha Sarkar</strong><br>Database Manager</p>
                <p><strong>Parama Bhattacharjee</strong><br>Backend Developer</p>
                <p><strong>Bristy Das</strong><br>Advisor & Mental Health Consultant<br></p>
        </div>
        <h2><strong>Contact Us</strong></h2>
        <p>01234-678904,01234-345689<br>Email:abscs@gamil.com</p>
        </div>
        <p class="journey">Our website Launched full version with emergency SOS system at <strong>January,2025</strong></p>
        <div style="text-align:center;font-size:20px">
        <a href="User_Dashboard.php" style="color:black;">Main Page</a>
        </div>
    <footer>
        <p>&copy;2025 Women Safety Portal.All rights reserved.</p>
    </footer>
    </body>
</html>