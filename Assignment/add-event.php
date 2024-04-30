<?php
 require_once ('mysqli_connect.php');
  session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}
    $adminID=$_SESSION['adminID'];
     $event_name= $event_type= $event_time= $event_date= $contact_number=$venue="";
     $event_namer= $event_typer= $event_timer= $event_dater= $contact_numberr=$venuer="";
   
    if(!empty($_POST)){
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

        if(empty($event_namer)&&empty($event_typer)&&empty($event_dater)&&empty($event_timer)&&empty($venuer)&&empty($contact_numberr))
        {
            
            $q = "INSERT INTO event(Event_name,Event_type,Venue,Event_date,Event_time,Contact_number,adminID) 
            VALUES('$event_name','$event_type','$venue','$event_date','$event_time','$contact_number','$adminID')";
            $r = @mysqli_query($dbc,$q);
            if($r) {
                echo "<script type='text/javascript'>
                        alert('add event sucessful');
                        document.location.href='add-event.php'
                        </script>";   
            } else {
                echo "<script type='text/javascript'>
                alert('failed to add event');
                document.location.href='add-event.php'
                </script>"; 
            }
            mysqli_close($dbc);
        }
}
 ?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="add-event.css" rel="stylesheet" type="text/css" />
        <link href="logo.jpg" rel="shortcut icon" />
    </head>
    <style>
        input[type="text"],select[name="event_type"],input[type="date"],input[type="time"]{
            height:30px;
        }
        </style>
    <body>
    <header><?php include 'admin-header.php' ; ?></header>
        <div class="out_border">
            <h1>Add New Event</h1>
            <form action="add-event.php" method="post" class="add_event">
                <table border="0" cellpadding="5">
                    <tbody>
                        <tr>
                            <td>Event Name</td>
                            <td><input type="text" name="event_name" value="<?php echo$event_name;?>" size="50" placeholder="Event name" /> 
                            <span class="error"><?php echo $event_namer;?></span>
                        </td>
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
                    </tbody>
                </table>
                <div class="form_button">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="reset" value="Reset" name="reset" />
                </div>
            </form>
        </div>
    </body>
</html>