<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
$name=$_SESSION['user'];
$result=$conn->query("SELECT * FROM registration WHERE Full_Name='$name'");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View User Portal</title>
        <link rel="stylesheet" href="../CSS/Update_Profile_Info.css">
    </head>
    <body>
        <h1>Registration Information</h1>
        <table border="2" cellpadding="10" class="form_design">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Guardian Number</th>
                <th>Email Address</th>
                <th>Comments</th>
            </tr>
            <?php while($row=$result->fetch_assoc()){ ?>
            <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Full_Name']; ?></td>
                    <td><?php echo $row['Age']; ?></td>
                    <td><?php echo $row['Phone_Number']; ?></td>
                    <td><?php echo $row['Guardian_Number']; ?></td>
                    <td><?php echo $row['Email_Address']; ?></td>
                    <td>
                     <a href="User_Update.php?Id=<?= $row['Id']; ?>">Update</a>
                    </td>

            </tr>
            <?php } ?>
        </table>
        <div style="text-align:center;font-size:20px">
        <a href="User_Dashboard.php" style="color:black;">Previous Page</a>
        </div>
    </body>
</html>