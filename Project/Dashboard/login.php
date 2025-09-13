<?php
session_start();
include "config.php";
$error="";
if(isset($_SESSION['user'])){
    if($_SESSION['user']=='Admin'){
        header("Location:../Admin/View/Admin_Dashboard.php");
        exit();
    }
    else{
        header("Location:../User/View/Home.php");
        exit();
    }
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=trim($_POST["username"]);
    $password=trim($_POST["password"]);
    $remember=isset($_POST["remember"]);
    $stmt=$conn->prepare("SELECT * FROM login  WHERE Username=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $admin_result=$stmt->get_result();
    if($admin_result->num_rows==1){
        $row=$admin_result->fetch_assoc();
        if(password_verify($password,$row['Password'])){
            $_SESSION["user"]=$row["Username"];
            if($remember){
                   setcookie("user", $user, time()+(86400*30),"/"); 
            }
            header("Location:../Admin/View/Admin_Dashboard.php");
            exit();
        } 
        else{
            $error="Invalid Password".$stmt->error;
        }
    }
    else{
        $stmt=$conn->prepare("SELECT * FROM registration WHERE Full_Name=?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $user_result=$stmt->get_result();
        if($user_result->num_rows==1){
           $row=$user_result->fetch_assoc();
           if(password_verify($password,$row['Password'])){
              $_SESSION['user']=$row['Full_Name'];
              if($remember){
                   setcookie('user', $user, time()+(86400*30),"/"); 
              }
              header("Location:../User/View/Home.php");
              exit();
            }
            else{
              $error="Invalid Password".$stmt->error;
            }
        }
        else{
           $error="User Not Found";
       }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
    <div class="container">
        <form method="POST">
           <input type="text" name="username" placeholder="UserName"><br><br>
           <input type="password" name="password" placeholder="Password"><br>
           <label><input type="checkbox" name="remember">Remember Me</label><br>
           <p><a href="forgot_password.php" style="font-size:10px;font-weight:bold;">Forgot Password</a></p>
           <div class="button_group">
           <input type="submit" value="Login" class="button"> 
           <input type="button" value="Back" class="button" onclick="window.location.href='dashboard.php';">
           </div><br>
           <div style="text-align:center">
           <a href="registration.php" style="font-size:15px;font-weight:bold;">Do You Register?</a>
           </div>
           <p style="color:black; font-size: 15px; font-weight:bold;"><?php if(!empty($error)) echo $error; ?></p>
        </form><br><br>
    </div>
    </body>
</html>