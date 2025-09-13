<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
if(!isset($_SESSION['EmergencyAlert'])){
$result=$conn->query("SELECT * FROM emergency_access WHERE Status='Active'");
if($result->num_rows>0){
    echo "<script>alert('⚠️Emergency Alert!Check The Notification Immediately');</script> ";   
}
$_SESSION['EmergencyAlert']=true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../CSS/Admin_Dashboard.css">
    </head>
    <body> 
    <div class="navbar">
     <a href="User_Portal.php">View Portal</a>  
     <a href="Add_Seminar.php"> Organize Seminar</a> 
     <a href="Receive_Notification.php">Emergency Notification</a>
     <a href="Schedule_Seminar.php">Schedule Seminar</a>
     <a href="../../Dashboard/logout.php">Log out</a>
    </div>
    <div  class="message" style="text-align:center">
    <h2>Welcome, <?php echo $_SESSION["user"]; ?> 🎉</h2>
    </div>
    </body>
</html>    