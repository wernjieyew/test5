<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

$studentid=$_REQUEST['id'];
$studentname="";
$email="";

if(!empty($_POST))
{
    $q="DELETE FROM student WHERE studentID='$studentid'";
    $r=mysqli_query($dbc,$q);
    if($r){
        echo "<script type='text/javascript'>
        alert('Delete sucessful');
        document.location.href='member-list.php'
        </script>"; 
    }else{
            echo"<script type='text/javascript'>
            alert('Delete failed');
            document.location.href='member-list.php'
        </script>";
    }
    $r=@mysqli_query($dbc,$q);
}else{
    $q="SELECT * FROM student WHERE studentID='$studentid'";
    $r=mysqli_query($dbc,$q);

    if(mysqli_num_rows($r)==1){
        $row=mysqli_fetch_array($r);
        $studentid=$row['studentID'];
        $studentname=$row['Fullname'];
        $email=$row['Email'];
    }
    mysqli_free_result($r);
}

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
        <h1>Delete Member</h1>
        <form action="deletemember.php" method="post" class="add_event">
            <table> 
                    <tr>
                        <th>Student ID</th>
                        <th><?php echo $studentid?>
                        <input type="hidden" name="id" value="<?php echo $studentid?>" />
                        </th>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><?php echo $studentname;?>
                    </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email;?>
                    </td>
                    </tr>
            </table>
                    <div class="form_button">
                    <input type="submit" value="Delete" />
                    <input type="button" value="Cancel" onclick="location='member-list.php'"/>
                    </div>
    </form>
    </div>
    </body>
   
</html>