<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
if(!isset($_GET['Id'])){
    echo "Id is not available";
    exit();
}
$id=$_GET['Id'];
$result=$conn->query("SELECT * FROM registration WHERE Id='$id'");
$row=$result->fetch_assoc();
$success=$error="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $fullname=$_POST["fullname"];
   $age=$_POST["age"];
   $phone=$_POST["phoneNumber"];
   $guardian=$_POST["guardianNumber"];
   $email=$_POST["emailAddress"];
   $pass=$_POST["password"];
   if(!empty($pass)){
      $hash_password=password_hash($pass,PASSWORD_DEFAULT);
      $sql=$conn->query("UPDATE registration SET full_name='$fullname',Age='$age',Phone_Number='$phone',Guardian_Number='$guardian',Email_Address='$email',Password='$hash_password' WHERE Id=$id");
   }
   else{
      $sql=$conn->query("UPDATE registration SET full_name='$fullname',Age='$age',Phone_Number='$phone',Guardian_Number='$guardian',Email_Address='$email' WHERE Id=$id");
   }
   if($sql===TRUE){
    $success="User Updated Successfully";
    header("Location:User_Dashboard.php");
    exit();
   }
   else{
    $error="Can Not Update".$conn->error;
   }
}   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Update Page</title>
        <link rel="stylesheet" href="../CSS/User_Update.css">
    </head>
    <body>
      <h3>Update User Information</h3>
      <form method="POST" class="form_design">
       <label>Full Name</label>
         <input type="text" name="fullname" value="<?php echo $row["Full_Name"]; ?>"><br>
         <label>Age</label>
         <input type="text" name="age" value="<?php echo $row["Age"]; ?>"><br>
         <label>Phone Number</label>
         <input type="text" name="phoneNumber" value="<?php echo $row["Phone_Number"]; ?>"><br>
         <label>Guardian Number</label>
         <input type="text" name="guardianNumber" value="<?php echo $row["Guardian_Number"]; ?>"><br>
         <label>Email Address</label>
         <input type="text" name="emailAddress" value="<?php echo $row["Email_Address"]; ?>"><br>
         <label>Password</label>
         <input type="password" name="password" value="<?php echo $row["Password"]; ?>"><br>
         <button type="submit">Update</button>
      </form>
        <div style="text-align:center;font-size:20px">
        <a href="Update_Portal_Info.php" style="color:black;">Previous Page</a>
        </div>
    </body>
</html>