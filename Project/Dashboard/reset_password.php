<?php
session_start();
include "config.php";
if(!isset($_SESSION['email'])||!isset($_SESSION['table'])||!isset($_SESSION['otp_verified'])){
    header("Location:forgot_password.php");
    exit();
}
$email=$_SESSION['email'];
$table=$_SESSION['table'];
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $new_password=trim($_POST['password']);
    if(empty($new_password)){
        $message="Password Can Not Be Empty";
    }
    else{
        $hashed_password=password_hash($new_password,PASSWORD_DEFAULT);
        if($table=='login'){
            $stmt=$conn->prepare("UPDATE login SET Password=?,otp=Null,otp_expiry=NULL WHERE Email=?");
            $stmt->bind_param("ss",$hashed_password,$email);
            if($stmt->execute()){
                $message="Password Reset Successfully! <a href='login.php'>Login Now</a>";
                unset($_SESSION['email']);
                unset($_SESSION['table']);
                unset($_SESSION['otp_verified']);
                unset($_SESSION['generated_otp']);
            }
            else{
                $message="Something Wrong!Please Try Again";
            }
        }
        else{
            $stmt=$conn->prepare("UPDATE registration SET Password=?,otp=Null,otp_expiry=NULL WHERE Email_Address=?");
            $stmt->bind_param("ss",$hashed_password,$email);
            if($stmt->execute()){
               $message="Password Reset Successfully! <a href='login.php'>Login Now</a>";
               unset($_SESSION['email']);
               unset($_SESSION['table']);
               unset($_SESSION['otp_verified']);
               unset($_SESSION['generated_otp']);
            }
            else{
               $message="Something Wrong!Please Try Again";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
    </head>
    <body>
        <h2>Enter Password</h2>
        <style>
            body{
                background-color: rgba(166, 229, 235, 1);
            }
        </style>
    <form method="POST">
        <input type="password" name="password" placeholder="Enter New Password">
        <button type="submit">Reset Password</button>
    </form>
    <p><?php echo $message;?></p>
    <div style="text-align:left">
        <a href="login.php" style="color:black;">Previous Page</a>
    </div>
 </body>   
</html>
