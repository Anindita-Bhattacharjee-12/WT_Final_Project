<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../../Dashboard/login.php");
    exit();
}
include "../../Dashboard/config.php";
$result=$conn->query("SELECT * FROM seminars");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Seminar</title>
        <link rel="stylesheet" href="../CSS/Schedule_Seminar.css">
    </head>
    <body>
        <h1>Upcoming Program</h1>
        <table border="2" cellpadding="10" class="form_design">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Date</th>
            </tr>
            <?php while($row=$result->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row['Id'];?></td>
                    <td><?php echo $row['Title'];?></td>
                    <td><?php echo $row['Seminar_Date'];?></td>    
                </tr>
            <?php } ?>
        </table>
        <div style="text-align:center;font-weight:bold;font-size:20px">
        <a href="Admin_Dashboard.php" style="color:white;">Previous Page</a>
        </div>
    </body>
</html>