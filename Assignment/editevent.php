<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

$event_id=$_REQUEST['id'];
$event_name=$event_type= $event_time= $event_date= $contact_number=$venue="";
$event_typer= $event_timer= $event_dater= $contact_numberr=$venuer="";

if(!empty($_POST))
{
    $event_name=trim($_POST['event_name']);
    $event_type=trim($_POST['event_type']);
    $venue=trim($_POST['venue']);
    $event_date=trim($_POST['event_date']);
    $event_time=trim($_POST['event_time']);
    $contact_number=trim($_POST['contact_number']);

    if($event_name == null)
    {
        $event_namer = 'Event Name required';
    }elseif (strlen($event_name) > 50)
    {
        $event_namer = 'cannot more than 50 words please try again';
    }

    if($event_type == null)
    {
        $event_typer = 'Event Type required';
    }
    
    if($venue == null)
    {
        $venuer = 'Venue required';
    }

    if($event_date == null)
    {
        $event_dater = 'Date required';
    }
    if($event_time == null)
    {
        $event_timer = 'Time required';
    }
    if($contact_number == null)
    {
        $contact_numberr = 'contact number required';
    }
    elseif (!preg_match('/^01\d{8}$/', $contact_number))
    {
        $contact_numberr = 'invalid contact number';
    }

    if(empty($event_namer)&&empty($event_typer)&&empty($event_dater)&&empty($event_timer)&&empty($venuer)&&empty($contact_numberr)){

        $q="UPDATE event SET Event_id='$event_id',
        Event_name='$event_name',
        Event_type='$event_type',
        Venue='$venue',
        Event_date='$event_date',
        Event_time='$event_time',
        Contact_number='$contact_number' WHERE Event_id='$event_id'";
        $r=mysqli_query($dbc,$q);
        if($r){
            echo "<script type='text/javascript'>
            alert('Update sucessful');
            document.location.href='manage-booking.php'
         </script>"; 
        }else{
             echo"<script type='text/javascript'>
             alert('Update failed');
             document.location.href='manage-booking.php'
          </script>";
        }
        $r=@mysqli_query($dbc,$q);
    }
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
        <form action="editevent.php" method="post" class="add_event">
            <table> 
                    <tr>
                        <th>Event ID</th>
                        <th><?php echo $event_id?>
                        <input type="hidden" name="id" value="<?php echo $event_id?>" />
                        </th>
                    </tr>

                    <tr>
                        <th>Event Name</th>
                        <th><input type="text" name="event_name" value="<?php echo $event_name?>" />
                        </th>
                    </tr>
                    <tr>
                    <td>Event Type</td>
                    <td><select name="event_type">
                    <option value="">-Please select event type-</option>
                    <option value="Competition"<?php if($event_type=='Competition') {echo 'selected';} ?>>Competition</option>
                    <option value="Workshop"<?php if($event_type=='Workshop') {echo 'selected';} ?>>Workshop</option>
                    <option value="Talk"<?php if($event_type=='Talk') {echo 'selected';} ?>>Talk</option>
                    </select>  
                    <span class="error"><?php echo $event_typer;?></span>  
                    </td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td><input type="text" name="venue" value="<?php echo $venue;?>" size="15" /> 
                        <span class="error"><?php echo $venuer;?></span>
                    </td>
                    </tr>
                    <tr>
                        <td>Event Date</td>
                        <td>
                            <input type="date" name="event_date" value="<?php echo $event_date;?>" placeholder="dd-mm-year" />
                            <span class="error"><?php echo $event_dater;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Event Time</td>
                        <td>
                            <input type="time" name="event_time" value="<?php echo $event_time;?>"/>
                            <span class="error"><?php echo $event_timer;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>
                            <input type="text" name="contact_number" value="<?php echo $contact_number;?>" placeholder="e.g 01XXXXXXXX" />
                            <span class="error"><?php echo $contact_numberr;?></span>
                        </td>
                    </tr>
                </table>

                <div class="form_button">
                    <input type="submit" value="Update" name="submit" />
                    <input type="button" value="Cancel" onclick="location='manage-booking.php'"/>
                </div>
            </table>
    </form>
    </div>
    </body>
   
</html>