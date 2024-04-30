<?php session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}?>
<?php require_once ('mysqli_connect.php');
$student_id=$_SESSION['studentID'];

$q = "SELECT * FROM student WHERE studentID='$student_id'";
$r = @mysqli_query($dbc,$q);

if(mysqli_num_rows($r)==1){
    $row=mysqli_fetch_array($r);
    $name=$row['Fullname'];
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        .border 
        {
            border-style: ridge;
            width:400px;
            height:200px;
            display: flex;
            margin: 50px;
            justify-content: center;
            align-items: center;
            color:white;
            margin-left:525px;
            margin-top:15px;
            background-color:rgb(131, 123, 123);
        }
    
        .heading{
            text-align:center;
            margin-top:100px;
        }
        td {
            height: 50px;
            text-align:center;
            width:100px;
        }
    </style>

    <body>  
        <header><?php include 'member_header.php' ; ?></header>
            <div class="heading">
                <h1 style="display: inline;">Profile</h1>
                <a href="update-profile.php" style="display:inline-block;"><i class="ace-icon fa fa-pencil-square-o fa-lg green"></i>Edit</a>
            </div>
            <div class="border">
                <table>

                    <tr>
                        <td>Student ID:</td>
                        <td><?php echo $student_id;?></td>
                    </tr> 
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $name;?></td>
                    </tr> <br/>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $email;?></td>
                    </tr>
                </table>    
            </div>
    </body>
   
</html>