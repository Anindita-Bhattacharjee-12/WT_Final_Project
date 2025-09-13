<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
if(!isset($_GET['Id'])){
    header("Location:Admin_Dashboard.php");
    exit();
}
$id=$_GET['Id'];
$result=$conn->query("SELECT * FROM emergency_access WHERE Id=$id");
$row=$result->fetch_assoc();
$success=$error="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $message=$_POST["message"];
    $conn->query("INSERT INTO safety_notifications(EmergencyId,Message,Created_At) VALUES ($id,'$message',NOW())");
    $conn->query("UPDATE emergency_access SET Status='Handled' WHERE Id=$id");
    $success="Safety Message Sent Successfully";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Safety Notification</title>
        <link rel="stylesheet" href="../CSS/Give_Safety_Notification.css">
    </head>
    <body>
        <center>
        <h1>Safety Notification For <?php echo $row["Name"];?></h1>
        </center>
        <form method="POST" class="form_design">
            <label>Message</label><br>
            <textarea name="message" rows="10" columns="60"></textarea><br><br>
            <button type="submit">Send Help</button>
            <div style="text-align:center;font-size:20px">
        <a href="Admin_Dashboard.php" style="color:black;">Previous Page</a>
        </div>
        </form>
    </body>
</html>