<?php require_once ('mysqli_connect.php');

session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}

 $student_id= $_SESSION['studentID'];
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="event-register.css" rel="stylesheet" />
        <link href="edit-delete.css" rel="stylesheet" />
        <link href="logo.jpg" rel="shortcut icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
      Table{
               
               margin: 25px 0;
               border: 3px solid;
               min-width:100%;
           }
           
           th {
               background-color: black;
               color:white;
               text-align: center;
               font-weight: bold;
           }

           td{
               text-align:center;
               background-color:#f3f3f3; 
               border-bottom: 3px solid #dddddd; 
               padding: 20px 20px;
           }
           h1{
               text-align:center;
               color:rgb(116, 16, 203);
           }
    </style>
    <body class="page">
    <header><?php include 'member_header.php' ; ?></header>
    
        <h1>Joined Event</h1><br><br>
        <table> 
                <tr> 
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone No</th>
                <th colspan="2">Action</th>
                </tr>

                <?php
                $q="SELECT * FROM participant WHERE studentID='$student_id'";
                $r=mysqli_query($dbc,$q);
                $num=mysqli_num_rows($r);
                
                if($num>0)
                {
                    while($row=mysqli_fetch_array($r))
                    {
                        printf('
                        <tr>
                            <td>'.$row['Event_id'].'</td>
                            <td>'.$row['Event_name'].'</td>
                            <td>'.$row['studentID'].'</td>
                            <td>'.$row['studentname'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone_no'].'</td>
                            <td align="center">
                            <a href = "edit-event-joined.php?id='.$row['Event_id'].'&name='.$row['Event_name'].'&student='.$row['studentID'].'&type='.$row['Event_type'].'"class="edit-btn" style="background-color:#0cdf33;font-size:1em;text-decoration:none;"><span class="edit-value">&#128393;Edit</span></a >
                            </td>
                            <td align="center">
                            <a href = "delete-event-joined.php?id='.$row['Event_id'].'&name='.$row['Event_name'].'&student='.$row['studentID'].'&type='.$row['Event_type'].'"class="delete-btn"style="background-color:#f50b0b;font-size:1em;text-decoration:none;"><span class="delete-value"><i class="fa fa-trash-o"></i>Delete</span></a >
                            </td>
                        </tr>
                        ');
                    }
                }
                printf('
                <tr>
                    <td colspan="9">Total '.$num.' Event Joined</td>
                </tr>
                ');
                
                mysqli_close($dbc);
                ?>
            
        </table>
       
    </body>
</html>
