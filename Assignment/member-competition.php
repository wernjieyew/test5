<?php session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="event.css" rel="stylesheet" type="text/css" />
    </head>
    <style>
        a:link, a:visited {
            background-color:rgb(116, 16, 203);
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 10px;
            min-width: 50px;
        }
        </style>
    <body>
    <?php
            require_once('mysqli_connect.php');

            $q = "SELECT * FROM event WHERE Event_type = 'Competition'";
            $r = @mysqli_query($dbc,$q);
            $num = mysqli_num_rows($r);

            if($num > 0)
            {
                while($row = mysqli_fetch_array($r))
                {
                echo'<div class="border_row">
                         <div class="event_row">
                             <div class="row1">
                                <img src="singing-icon.jpg" />
                                 <div class="content">
                                <h1>'.$row['Event_name'].'</h1>
                                    <p>'.$row['Event_date'].'</p>
                                    <p>'.$row['Event_time'].'</p>
                                    <p>'.$row['Venue'].'</p>
                                    <p>'.$row['Contact_number'].'</p>
                                    <a href="member-competition-register.php?id='.$row['Event_id'].'&name='.$row['Event_name'].'&type='.$row['Event_type'].'"target="_blank">JOIN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>'; 
            }
        } ?>    
    </body>
</html>
