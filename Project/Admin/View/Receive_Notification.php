<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
$result=$conn->query("SELECT * FROM emergency_access ORDER BY Created_Date DESC");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Notification Page</title>
        <link rel="stylesheet" href="../CSS/Receive_Notification.css">
    </head>
    <body>
        <center>
        <h2>Emergency Request List</h2>
        </center>
        <table border="2" cellpadding="10" class="form_design">
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Date</th>
                <th>Action</th>
                <th>Comments</th>
            </tr>
            <?php while($row=$result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Location'];?></td>
                    <td><?php echo $row['Created_Date'];?></td>
                    <td><?php echo $row['Status'];?></td>
                    <td>
                    <?php if($row['Status']=='Active'){?>
                     <a href="Give_Safety_Notification.php?Id=<?php echo $row['Id']; ?>">Action</a>
                    <?php } 
                    else{?> Handled<?php } ?>
                    </td>
                </tr>
                <?php } ?>
        </table>
        <div style="text-align:center;font-size:20px">
        <a href="Admin_Dashboard.php" style="color:white;">Previous Page</a>
        </div>
    </body>
</html>