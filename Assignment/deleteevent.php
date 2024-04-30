<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

$event_id=$_REQUEST['id'];

if(!empty($_POST))
{
    $q="DELETE FROM event WHERE Event_id='$event_id'";
    $r=mysqli_query($dbc,$q);
    if($r){
        echo "<script type='text/javascript'>
        alert('Delete sucessful');
        document.location.href='manage-booking.php'
        </script>"; 
    }else{
            echo"<script type='text/javascript'>
            alert('Delete failed');
            document.location.href='manage-booking.php'
        </script>";
    }
    $r=@mysqli_query($dbc,$q);
}
$q="SELECT * FROM event WHERE Event_id='$event_id'";
$r=mysqli_query($dbc,$q);

if(mysqli_num_rows($r)==1){
    $row=mysqli_fetch_array($r);
    $event_id=$row['Event_id'];
    $event_name=$row['Event_name'];
    $event_type= $row['Event_type'];
    $event_time=$row['Event_time']; 
    $event_date= $row['Event_date'];
    $contact_number=$row['Contact_number'];
    $venue=$row['Venue'];;
}
mysqli_free_result($r);
mysqli_close($dbc);
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="logo.jpg" rel="shortcut icon"/>
        <link href="add-event.css" rel="stylesheet" type="text/css" />
    </head>
    <style>
        h1{
            text-align:center;
            color:rgb(116, 16, 203);
        }
        input[type='button']{
            font-size: 1.2em;
            padding: 5px;
            margin: 5px;
            background: rgb(116, 16, 203);
            color: white;
        }
        .add_event table th
        {
            color: white;
            padding: 10px;
            text-align:left;
        }
        input[type='text']{
            height:35px
        }
    </style>

    <body class="content">  
        <header><?php include 'admin-header.php' ; ?></header>
        <div class="out_border">
        <h1>Edit Member</h1>
        <form action="deleteevent.php" method="post" class="add_event">
            <table> 
            <tr>
                    <th>Event ID</th>
                    <th><?php echo $event_id?>
                    <input type="hidden" name="id" value="<?php echo $event_id?>" />
                    </th>
                    <tr>
                    <th>Event Name</th>
                    <th><?php echo $event_name?></th>
                    </tr>
                    <tr>
                    <td>Event Type</td>
                    <td><?php echo $event_type?></td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td><?php echo $venue;?></td>
                    </tr>
                    <tr>
                        <td>Event Date</td>
                        <td><?php echo $event_date;?></td>
                    </tr>
                    <tr>
                        <td>Event Time</td>
                        <td><?php echo $event_time;?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><?php echo $contact_number;?></td>
                    </tr>
            </table>
                    <div class="form_button">
                    <input type="submit" value="update" />
                    <input type="button" value="Cancel" onclick="location='manage-booking.php'"/>
                    </div>
    </form>
    </div>
    </body>
   
</html>