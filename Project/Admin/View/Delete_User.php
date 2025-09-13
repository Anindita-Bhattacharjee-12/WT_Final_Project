<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $sql="DELETE FROM registration WHERE Id=$id";
    if($conn->query($sql)===TRUE){
        header("Location:User_Portal.php");
        exit();
    }
    else{
        echo "Error".$conn->error;
    }
}