<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
$name=$_SESSION['user'];
$result=$conn->query("SELECT s.Message,s.Created_At FROM safety_notifications s JOIN emergency_access e ON s.EmergencyId=e.Id WHERE e.Name='$name' ORDER BY Created_At DESC");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Safety Notification Page</title>
        <link rel="stylesheet" href="../CSS/Safety_Notification.css">
    </head>
    <body>
        <center>
        <h1>Safe Message</h1>
        </center>
        <table border="2" cellpadding="10" class="form_design">
            <tr>
                <th>Message</th>
                <th>Created_At</th>
            </tr>
            <?php while($row=$result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row['Message'];?></td>
                    <td><?php echo $row['Created_At'];?></td>
                </tr>
            <?php }?>  
        </table>
        <br><br><br><br><br><br><br><br><br><br>
        <div style="text-align:center;font-size:20px">
        <a href="User_Dashboard.php" style="color:white;">Previous Page</a>
        </div>      
    </body>
</html>