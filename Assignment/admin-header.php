<?php
require_once ('mysqli_connect.php');
$adminid=$_SESSION['adminID'];


$q = "SELECT AdminID FROM admin WHERE AdminID = '$adminid'";
$r = @mysqli_query($dbc, $q);

if (mysqli_num_rows($r)==1)
{
    $row = mysqli_fetch_array($r);
    $adminid = $row['AdminID'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin-header.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin header</title>
    <style>
    </style>
</head>
<style>
.profile{
    color:yellow;
    font-weight:800;
}
 </style>
<body>
   
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                Welcome<br /><?php echo $adminid;?></button>
             </div>
            <ul>
                <li data-text="dashboard"><a href="dashboard.php">Dashboard</a></li>
                <li data-text="Add Event"><a href="add-event.php">Add Event</a></li> 
                <li data-text="Member List"><a href="member-list.php">Member List</a></li>
                <li data-text="Manage Booking"><a href="manage-booking.php">Manage Event</a></li>
                <li data-text="Add-announcement"><a href="feedback.php">Feedback</a></li>
                <li data-text="Joined Event"><a href="joined-event.php">Participant</a></li>
                <li data-text="Logout"><a href="logout.php">Logout</a></li>
            </ul>
       </div>
       <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>   
        </div>
      <script>  
            var hamburger = document.querySelector(".hamburger");
            hamburger.addEventListener("click", function(){
                document.querySelector("body").classList.toggle("active");
            })
            </script>
    </body>
    </html>
   