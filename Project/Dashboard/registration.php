<?php
include "config.php";
$error="";
$fullname=$age=$phone=$guardian=$email=$pass="";
$fullnameErr=$ageErr=$phoneErr=$guardianErr=$emailErr=$passErr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $fullname=$_POST["fullname"];
   $age=$_POST["age"];
   $phone=$_POST["phoneNumber"];
   $guardian=$_POST["guardianNumber"];
   $email=$_POST["emailAddress"];
   $pass=$_POST["password"];
   if(empty($fullname)){
      $fullnameErr="Name is required";
   }
   else{
      $fullname=$_POST["fullname"];
      if(!preg_match("/^[A-Za-z\s]+$/",$fullname)){
         $fullnameErr="Invalid Name";
      }
   }
   if(empty($age)){
      $ageErr="Age is required";
   }
   else{
      $age=$_POST["age"];
      if(!is_numeric($age)||$age<1||$age>100){
         $ageErr="Age must be between this";
      }
   }
   if(empty($phone)){
      $phoneErr="Number is required";
   }
   else{
      $phone=$_POST["phoneNumber"];
      if(!preg_match("/^[0-9]{11}$/",$phone)){
         $phoneErr="Phone number must be 11 digit";
      }
   }
   if(empty($guardian)){
      $guardianErr="Number is required";
   }
   else{
      $guardian=$_POST["guardianNumber"];
      if(!preg_match("/^[0-9]{11}$/",$guardian)){
         $guardianErr="Phone number must be 11 digit";
      }
   }
   if(empty($email)){
      $emailErr="Email is required";
   }
   else{
      $email=$_POST["emailAddress"];
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $emailErr="Invalid email";
      }
   }
   if(empty($pass)){
      $passErr="Password is required";
   }
   else{
      $pass=$_POST["password"];
      if(strlen($pass)<4){
         $passErr="Invalid password.Password at least 4 characters";
      }
   }
   if(empty($fullnameErr)&&empty($ageErr)&&empty($phoneErr)&&empty($guardianErr)&&empty($emailErr)&&empty($passErr)){
      $hash_password=password_hash($pass,PASSWORD_DEFAULT);
      $stmt=$conn->prepare("INSERT INTO registration(Full_Name,Age,Phone_Number,Guardian_Number,Email_Address,Password) VALUES (?,?,?,?,?,?)");
      $stmt->bind_param("sissss",$fullname,$age,$phone,$guardian,$email,$hash_password);
      if($stmt->execute()){
         header("Location:login.php");
         exit();
      }
      else{
         $error="Insert Failed!".$stmt->error;
      }
   }
   else{
      $error="Please Correct The Error First";
   }
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Registration Page</title>
      <link rel="stylesheet" href="Registration.css">
   </head>
   <body>
      <h1>Registration Form</h1>
      <form method="POST">
         <label>Full Name</label>
         <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname);?>"><br>
         <span style="color:red;"><?php echo $fullnameErr;?></span><br>
         <label>Age</label>
         <input type="text" name="age" value="<?php echo htmlspecialchars($age);?>"><br>
         <span style="color:red;"><?php echo $ageErr;?></span><br>
         <label>Phone Number</label>
         <input type="text" name="phoneNumber" value="<?php echo htmlspecialchars($phone);?>"><br>
         <span style="color:red;"><?php echo $phoneErr;?></span><br>
         <label>Guardian Number</label>
         <input type="text" name="guardianNumber" value="<?php echo htmlspecialchars($guardian);?>"><br>
         <span style="color:red;"><?php echo $guardianErr;?></span><br>
         <label>Email Address</label>
         <input type="text" name="emailAddress" value="<?php echo htmlspecialchars($email);?>"><br>
         <span style="color:red;"><?php echo $emailErr;?></span><br>
         <label>Password</label>
         <input type="password" name="password" value="<?php echo htmlspecialchars($pass);?>"><br>
         <span style="color:red;"><?php echo $passErr;?></span><br>
         <input type="submit" value="Register" class="submitRegister"> 
         <input type="reset" value="Reset" class="submitRegister">
      </form>
      <div style="text-align:right;font-size:20px">
        <a href="login.php" style="color:white;">Previous Page</a>
        </div>
      <p style="color:red;"><?php echo $error; ?></p>
   </body>
</html>