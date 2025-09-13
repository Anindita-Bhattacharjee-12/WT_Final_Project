<?php
session_start();
include "config.php";
if(!isset($_SESSION['email'])||!isset($_SESSION['table'])){
    header("Location:forgot_password.php");
    exit();
}
$email=$_SESSION['email'];
$table=$_SESSION['table'];
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $otp_input=trim($_POST['otp']);
    if($table=='login'){
        $stmt=$conn->prepare("SELECT * FROM login WHERE Email=? AND otp=? AND otp_expiry>NOW()");
        $stmt->bind_param("ss",$email,$otp_input);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows==1){
            $_SESSION['otp_verified']=true;
            header("Location:reset_password.php");
            exit();
        }
        else{
            $message="Invalid OTP";
        }
    }
    else{
        $stmt=$conn->prepare("SELECT * FROM registration WHERE Email_Address=? AND otp=? AND otp_expiry>NOW()");
        $stmt->bind_param("ss",$email,$otp_input);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows==1){
            $_SESSION['otp_verified']=true;
            header("Location:reset_password.php");
            exit();
        }
        else{
            $message="Invalid OTP";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <style>
        body{
            background-color: rgba(135, 201, 207, 1);
        }
    </style>
    <h2>Verify OTP</h2>
    <form method="POST">
        <input type="text" name="otp" placeholder="Enter OTP">
        <button type="submit">Verify OTP</button>
    </form>
    <p style="color:red;"><?php echo $message;?></p>
    <p>Test OTP:<?php echo $_SESSION['generated_otp'];?></p>
    <div style="text-align:left">
        <a href="login.php" style="color:black;">Previous Page</a>
    </div>
</body>
</html>
