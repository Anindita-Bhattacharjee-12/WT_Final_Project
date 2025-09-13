<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
$name=$_SESSION['user'];
if(!isset($_SESSION['SeminarAlert'])){
$result=$conn->query("SELECT Title,Seminar_Date FROM seminars WHERE Seminar_Date>=CURDATE()  ORDER BY Seminar_Date ASC LIMIT 1");
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $title=$row['Title'];
    $date=$row['Seminar_Date'];
    echo "<script>alert('🎉Upcoming Seminar! ".$title." ".$date."');</script>";  
    $_SESSION['SeminarAlert']=true;
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Dashboard</title>
        <link rel="stylesheet" href="../CSS/User_Dashboard.css">
    </head>
    <body>
    <div class="navbar">
     <a href="SelfDefense.php">Safety Resources</a>  
     <a href="User_View_Seminar.php">Seminar Schedule</a> 
     <a href="Access_Emergency.php">Emergency Contact</a>
     <a href="Safety_Notification.php">Safety Notification</a>
     <a href="Update_Portal_Info.php">Update Portal</a>
     <a href="Home.php">Previous Page</a>
    </div>
    </body>
</html>