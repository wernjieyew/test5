<?php session_start();
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="logo.jpg" rel="shortcut icon"/>
        <link href="edit-delete.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
            margin-left:620px;
            background: rgb(217, 59, 70);
            color: white;
            width:12em;
        }

    </style>
    <body>
        <header><?php include 'admin-header.php' ; ?></header>
        <form action="feedback.php" method="POST">
        <br><h1>Feedback From member</h1><br><br>
        <?php if(!empty($_POST)){
		$feedback_id=$_POST['checked'];
		$q="DELETE FROM feedback WHERE feedbackID IN ('".implode("','",$feedback_id)."')";
		$r=mysqli_query($dbc,$q);

		if($r){
			echo "<script type='text/javascript'>
                    alert('Delete sucessful');
                    document.location.href='feedback.php'
                 </script>"; 
		}else{
			echo "<script type='text/javascript'>
            alert('Delete failed');
            document.location.href='feedback.php'
         </script>"; 
		}
	}?>
        <table class="qgg-table"> 
                <tr> 
                <th>&nbsp</th>
                <th>Feedback ID</th>
                <th>Student ID</th>
                <th>Fullname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Comment</th>
                </tr>

                <?php
                $q="SELECT * FROM feedback";
                $r=mysqli_query($dbc,$q);
                $num=mysqli_num_rows($r);
                
                if($num>0)
                {
                    while($row=mysqli_fetch_array($r))
                    {
                        printf('
                        <tr>
                            <td><input type="checkbox" name="checked[]" value="'.$row['feedbackID'].'" /></td>
                            <td>'.$row['feedbackID'].'</td>
                            <td>'.$row['studentID'].'</td>
                            <td>'.$row['fullname'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['comment'].'</td>
                        </tr>
                        ');
                    }
                }
                printf('
                <tr>
                    <td colspan="9">Total '.$num.' Feedback from member</td>
                </tr>
                ');
                
                mysqli_close($dbc);
                ?>
            
        </table>  <br />
        <div class="btn">
        <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure to delete all the checked record?')" />
            </div>
            </form>  
    </body>
</html>