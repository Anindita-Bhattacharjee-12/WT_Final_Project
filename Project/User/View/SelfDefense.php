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
        <link rel="stylesheet" href="../CSS/SelfDefense.css">
    </head>
    <body>
        <header>Empowerment And Safety Center</header>
        <p><strong><i>Safety Tips And Meditation</i></strong></p>
        <p>List Of Some Safety Rules:</p>
        <ul>
        <li>Always inform someone about your whereabouts</li>
        <li>Avoid walking alone at night</li>
        <li>If something feels wrong, act cautiously</li>
        <li>Keep emergency numbers saved</li>
        <li>Use well-lit and populated routes</li>
        <li>Share your live location with trusted contacts when traveling alone</li>
        <li>Avoid sharing personal details with strangers online or offline</li>
        <li>Use apps that track your location or send emergency alerts</li> 
        <li>Learn basic self-defense techniques or carry safety tools like pepper spray where legal</li>  
        </ul>
         <p>Here are suggested video and facebook link for Women Self-Defense and Meditation</p>
         <div style="display: flex; justify-content: center; gap: 40px; text-align: center;">
         <a href="https://youtu.be/KVpxP3ZZtAc?si=Tn19OzDTHNrNkrJI" style="color: blue;"><img src="../CSS/images.png" width="50" height="50"><br>YouTube</a>
        <a href="https://www.facebook.com/groups/allrgreat/?ref=share&mibextid=NSMWBT" style="color: blue;"><img src="../CSS/Facebook-logo.png" width="50" height="50"><br>Facebook</a>
        </div>
        <p><strong><i>Here Are Some Pictures Of Self-defense</i></strong></p>
        <div style="display: flex; justify-content: center; gap: 40px; text-align: center;">
            <div>
            <img src="../CSS/self1.webp" width="150" height="150" style="color: brown;"><br>Self Defense Shilhouette Royality
            </div>
            <div>
            <img src="../CSS/self2.jpg" width="150"  height="150" style="color: brown;"><br>Self Defense Battle Vector
            </div>
            <div>
            <img src="../CSS/self3.png" width="150"  height="150" style="color: brown;"><br>Self Defense Elbow Strike
            </div>
        </div><br><br>
        <div style="text-align:right;font-size:20px">
        <a href="User_Dashboard.php" style="color:black;">Previous Page</a>
        </div>
    </body>
</html>