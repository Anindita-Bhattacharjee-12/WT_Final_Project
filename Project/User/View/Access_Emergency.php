<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $location=$_POST["location"];
    if(!isset($_SESSION['Help'])){
    $sql="INSERT INTO emergency_access(Name,Location,Status) VALUES ('$name','$location','Active')";
      if($conn->query($sql)===TRUE){
        echo "<script>alert('Emergency!Help is on the way');</script>";
    }
    $_SESSION['Help']=true;
    }     
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Emergency Access Page</title>
        <link rel="stylesheet" href="../CSS/Access_Emergency.css">
    </head>
    <body>
        <center>
        <h2>Emergency Help</h2>
        </center>
        <form method="POST" class="form_design">
            <label>Name</label><br>
            <input type="text" name="name"><br><br>
            <label>Location</label><br>
            <textarea name="location" rows="10" columns="60"></textarea><br><br>
            <button type="submit">Help</button>
        </form>
         <div style="text-align:center;font-size:20px">
        <a href="User_Dashboard.php" style="color:black;">Previous Page</a>
        </div>
    </body>
</html>
