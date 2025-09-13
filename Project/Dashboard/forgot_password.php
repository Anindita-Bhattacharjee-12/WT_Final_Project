<?php
session_start();
include "config.php";
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=trim($_POST["email"]);
    $found=false;
    $stmt=$conn->prepare("SELECT * FROM login WHERE Email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows>0){
        $table="login";
        $email_column="Email";
        $found=true;
    }
    else{
        $stmt=$conn->prepare("SELECT * FROM registration WHERE Email_Address=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0){
            $table="registration";
            $email_column="Email_Address";
            $found=true;
        }
    }
    if($found){
        $otp=rand(min:100000,max:999999);
        $update_stmt=$conn->prepare("UPDATE $table SET otp=?,otp_expiry=DATE_ADD(NOW(),INTERVAL 10 MINUTE) WHERE $email_column=?");
        $update_stmt->bind_param("ss",$otp,$email);
        $update_stmt->execute();
        $_SESSION['email']=$email;
        $_SESSION['table']=$table;
        $_SESSION['generated_otp']=$otp;
        $message="OTP Generated:$otp <br><a href='verify_otp.php'>Click Here To Verify Otp</a>";
    }
    else{
        $message="Email Not Found";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
    </head>
    <body>
        <style>
            body{
                background-color:rgba(120, 196, 203, 1);
            }
        </style>
        <h2>Forget Password</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter Your Email">
            <button type="submit">Send OTP</button>
        </form>
        <p><?php echo $message; ?></p>
        <div style="text-align:left">
        <a href="login.php" style="color:black;">Previous Page</a>
        </div>
    </body>
</html>