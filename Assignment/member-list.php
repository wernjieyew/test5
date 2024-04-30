<?php require_once ('mysqli_connect.php');
session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>

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
        <link href="edit-delete.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </head>
    <style>
        h1{
            text-align:center;
            color:rgb(116, 16, 203);
        }
        .qgg-table{
            border-collapse: collapse;
            width:80%;
            border:1px solid #c6c6c6;
            margin-bottom:20px;
            margin-left:245px;
        }
        .qgg-table th{
            border-collapse: collapse;
            border-right:1px solid #c6c6c6;
            border-bottom:1px solid #c6c6c6;
            background-color:#ddeeff; 
            padding:5px 9px;
            font-size:20px;
            font-weight:normal;
            text-align:center;
        }
        .qgg-table td{
            border-collapse: collapse;
            border-right:1px solid #c6c6c6;
            border-bottom:1px solid #c6c6c6; 
            padding:5px 9px;
            font-size:16px;
            font-weight:normal;
            text-align:center;
            word-break: break-all;
        }
        .qgg-table tr:nth-child(odd){
            background-color:#fff ; 
        }
        .qgg-table tr:nth-child(even){
            background-color: #f8f8f8;
        }
        .btn input[type='submit']
        {
            font-size: 1.3em;
            margin-left:600px;
            background: rgb(217, 59, 70);
            color: white;
            width:12em;
        }
    </style>

    <body class="content">  
        <header><?php include 'admin-header.php' ; ?></header>
        <h1>Music Society Member List</h1>
        <form action="member-list.php" method="POST">
    <?php if(!empty($_POST)){
		$student_id=$_POST['checked'];
		$q="DELETE FROM student WHERE studentID IN ('".implode("','",$student_id)."')";
		$r=mysqli_query($dbc,$q);

		if($r){
			echo "<script type='text/javascript'>
                    alert('Delete sucessful');
                    document.location.member-list.php'
                 </script>"; 
		}else{
			echo "<script type='text/javascript'>
            alert('Delete failed');
            document.location.member-list.php'
         </script>"; 
		}
	}?>
        <table class="qgg-table"> 
                <tr>   
                <th>&nbsp</th>      
                <th>Student ID</th> 
                <th>Full Name</th>         
                <th>Email</th>  
                <th>Password</th>
                <th colspan="2">Action</th>
                </tr>
                <?php
                $q="SELECT * FROM student";
                $r=mysqli_query($dbc,$q);
                $num=mysqli_num_rows($r);
                
                if($num>0)
                {
                    while($row=mysqli_fetch_array($r))
                    {
                        printf('
                        <tr>
                            <td><input type="checkbox" name="checked[]" value="'.$row['studentID'].'" /></td>
                            <td>'.$row['studentID'].'</td>
                            <td>'.$row['Fullname'].'</td>
                            <td>'.$row['Email'].'</td>
                            <td>'.$row['Password'].'</td>
                            <td align="center">
                            <a href = "editmember.php?id='.$row['studentID'].'"class="edit-btn" style="background-color:#0cdf33;font-size:1em;text-decoration:none;"><span class="edit-value">&#128393;Edit</span></a >
                            </td>
                            <td align="center">
                            <a href = "deletemember.php?id='.$row['studentID'].'"class="delete-btn"style="background-color:#f50b0b;font-size:1em;text-decoration:none;"><span class="delete-value"><i class="fa fa-trash-o"></i>Delete</span></a >
                            </td>
                        </tr>
                        ');
                    }
                }
                printf('
                <tr>
                    <td colspan="7">Total '.$num.' Student</td>
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