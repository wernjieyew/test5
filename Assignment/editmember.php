<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

$studentid=$_REQUEST['id'];
$studentname="";
$email="";
$studentnamer=$emailr="";

if(!empty($_POST))
{
    $studentname=(trim($_POST['student_name']));
    $email  = (trim($_POST['email']));

    if($studentname == null){
        $studentnamer = '*Full name required'; 
      }else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $studentname)){
        $studentnamer = '*Invalid name';
    }
    if($email == null){
        $emailr = '*email required';
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailr= '*Invalid email';
      }
    if(empty($studentnamer)&&empty($emailr)){

        $q="UPDATE student SET studentID='$studentid',
        Fullname='$studentname',
        Email='$email' WHERE StudentID='$studentid'";
        $r=mysqli_query($dbc,$q);
        if($r){
            echo "<script type='text/javascript'>
            alert('Update sucessful');
            document.location.href='member-list.php'
         </script>"; 
        }else{
             echo"<script type='text/javascript'>
             alert('Update failed');
             document.location.href='member-list.php'
          </script>";
        }
        $r=@mysqli_query($dbc,$q);
    }
}
$q="SELECT * FROM student WHERE studentID='$studentid'";
$r=mysqli_query($dbc,$q);

if(mysqli_num_rows($r)==1){
    $row=mysqli_fetch_array($r);
    $studentid=$row['studentID'];
    $studentname=$row['Fullname'];
    $email=$row['Email'];
}
mysqli_free_result($r);

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
        <form action="editmember.php" method="post" class="add_event">
            <table> 
                    <tr>
                        <th>Student ID</th>
                        <th><?php echo $studentid?>
                        <input type="hidden" name="id" value="<?php echo $studentid?>" />
                        </th>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" name="student_name" value="<?php echo $studentname;?>" />
                        <span class="error"><?php echo $studentnamer;?></span>
                    </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php echo $email;?>" />
                        <span class="error"><?php echo $emailr;?></span>
                    </td>
                    </tr>
            </table>
                    <div class="form_button">
                    <input type="submit" value="update" />
                    <input type="button" value="Cancel" onclick="location='member-list.php'"/>
                    </div>
    </form>
    </div>
    </body>
   
</html>