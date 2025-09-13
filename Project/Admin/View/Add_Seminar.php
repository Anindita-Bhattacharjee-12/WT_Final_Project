<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $success=$error="";
    $title=$_POST['title'];
    $date=$_POST['date'];
    $sql="INSERT INTO seminars(Title,Seminar_Date) VALUES ('$title','$date')";
    if($conn->query($sql)===TRUE){
        $success="Successfully Organize Seminars";
    }
    else{
        $error="Failed To Add Seminars".$conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Seminars</title>
        <link rel="stylesheet" href="../CSS/Add_Seminar.css">
    </head>
    <body>
        <h1>Add Seminars</h1>
        <form method="POST" class="form_design">
            <label>Title</label><br>
            <input type="text" name="title"><br>
            <label>Date</label><br>
            <input type="date" name="date"><br><br>
            <button type="submit">Add</button>
        </form>
        <p style="color:red;"><?php if(!empty($error)) echo $error; ?></p>
        <div style="text-align:center;font-size:20px">
        <a href="Admin_Dashboard.php" style="color:black;">Previous Page</a>
        </div>
    </body>
</html>