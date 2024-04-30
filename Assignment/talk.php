<?php 
session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');?>
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
           .btn input[type='submit']
        {
            font-size: 1.3em;
            margin-left:450px;
            background: rgb(217, 59, 70);
            color: white;
            width:12em;
        }
    </style>
    <body class="page">
    <form action="talk.php" method="POST">
    <?php if(!empty($_POST)){
		$student_id=$_POST['checked'];
		$q="DELETE FROM participant WHERE studentID IN ('".implode("','",$student_id)."')";
		$r=mysqli_query($dbc,$q);

		if($r){
			echo "<script type='text/javascript'>
                    alert('Delete sucessful');
                    document.location.talk.php'
                 </script>"; 
		}else{
			echo "<script type='text/javascript'>
            alert('Delete failed');
            document.location.talk.php'
         </script>"; 
		}
	}?>
        <h1>Talk Register List</h1><br><br>
        <table> 
                <tr>
                <th>&nbsp</th>
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
                $q="SELECT * FROM participant WHERE Event_type='Talk'";
                $r=mysqli_query($dbc,$q);
                $num=mysqli_num_rows($r);
                
                if($num>0)
                {
                    while($row=mysqli_fetch_array($r))
                    {
                        printf('
                        <tr>
                        <td><input type="checkbox" name="checked[]" value="'.$row['studentID'].'" /></td>
                            <td>'.$row['Event_id'].'</td>
                            <td>'.$row['Event_name'].'</td>
                            <td>'.$row['studentID'].'</td>
                            <td>'.$row['studentname'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone_no'].'</td>
                            <td align="center">
                            <a href = "edit-talk-member.php?id='.$row['Event_id'].'&name='.$row['Event_name'].'&student='.$row['studentID'].'&type='.$row['Event_type'].'"class="edit-btn" style="background-color:#0cdf33;font-size:1em;text-decoration:none;"><span class="edit-value">&#128393;Edit</span></a >
                            </td>
                            <td align="center">
                            <a href = "delete-talk-member.php?id='.$row['Event_id'].'&name='.$row['Event_name'].'&student='.$row['studentID'].'&type='.$row['Event_type'].'"class="delete-btn"style="background-color:#f50b0b;font-size:1em;text-decoration:none;"><span class="delete-value"><i class="fa fa-trash-o"></i>Delete</span></a >
                            </td>
                        </tr>
                        ');
                    }
                }
                printf('
                <tr>
                    <td colspan="10">Total '.$num.' Student Register</td>
                </tr>
                ');
                
                mysqli_close($dbc);
                ?>
            
        </table>
        <br />
        <div class="btn">
        <input type="submit" name="delete" value="Multiple Delete" onclick="return confirm('Are you sure to delete all the checked record?')" />
            </div>
            </form>  
       
    </body>
</html>
