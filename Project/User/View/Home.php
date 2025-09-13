<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
$name=$_SESSION['user'];
if(!isset($_SESSION['SafetyNotification'])){
$result=$conn->query("SELECT s.Message FROM safety_notifications s JOIN emergency_access e ON s.EmergencyId=e.Id WHERE e.Name='$name' ORDER BY s.Created_At DESC LIMIT 1");
if($result->num_rows>0){
    echo "<script>alert('Safety Message Arrive!');</script>";  
}
$_SESSION['SafetyNotification']=true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shield Her.com</title>
        <link rel="stylesheet" href="../CSS/Home.css">
    </head>
    <body>
        <h2 style="text-align:right;"><i><strong> "Dear Society"</strong></i></h2>
        <p style="text-align: right;"><i>Dear society, hear her cry,<br>
        Why must she fear the night sky?<br>
        Why must locks and pepper spray?<br>
        Be what keeps the pain away?<br>
        Let's raise boys who respect and care,<br>
        Who understand what's just and fair?<br>
        Empathy, not dominance, wins the race<br>
        And makes this world a safer place.<br></i></p>
        <h1><i>Building a World Where Women Feel Safe</i></h1>
        <div style="text-align: center;">
        <header style="color: rgba(64, 58, 58, 1);">This platform is dedicated to empowering women and creating a safer society. Learn, connect, and raise awareness.</header><br>    
        </div>
        <div style="text-align:center">
         <a href="AboutUs.php">About Website</a><br> 
        </div>
        <div  class="message" style="text-align:center">   
        <h2>Welcome, <?php echo $_SESSION["user"]; ?> 🎉</h2>
        </div>
        <div style="text-align:center" class="button">
        <a href="User_Dashboard.php" style="color:black;">Next Page</a>
        <a href="../../Dashboard/logout.php" style="color:black;">Log Out</a>
        <a href="../../Dashboard/dashboard.php"style="color:black;">Previous Page</a>
        </div>
    </body>
</html>