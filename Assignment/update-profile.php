<?php session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}?>
<?php require_once ('mysqli_connect.php');
$student_id=$_SESSION['studentID'];
$name=$email="";
$namer=$emailr="";
if(!empty($_POST)){
    $name = trim($_POST['name']);
    $email  = trim($_POST['email']);

    if($name == null){
        $namer = '*Full name required'; 
      }else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name)){
        $namer = '*Invalid name';
    }

    if($email == null){
        $emailr = '*email required';
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailr= '*Invalid email';
      }

    if(empty($namer)&&empty($emailr)){

        $q="UPDATE student SET studentID='$student_id',
        Fullname='$name',
        Email='$email' WHERE studentID='$student_id'";
        $r=mysqli_query($dbc,$q);
        if($r){
            echo "<script type='text/javascript'>
            alert('Update sucessful');
            document.location.href='member_homepage.php'
         </script>"; 
        }else{
             echo"<script type='text/javascript'>
             alert('Update failed');
             document.location.href='member_homepage.php'
          </script>";
        }
        $r=@mysqli_query($dbc,$q);
    }
}
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
            background-color:rgb(14, 69, 137);
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
        .error{
            color:rgb(246, 1, 1);
        }
        input[type='text']{
            height:20px;
        }
        input[type='submit'], input[type='button']{
            font-size: 1.2em;
            padding: 5px;
            margin: 5px;
            background: rgb(116, 16, 203);
            color: white;
        }
        .form-button
        {
            position: flex;
            justify-content: center;
            text-align: center;
            margin-bottom: 100px;
            padding: 20px;
        }
    </style>

    <body>  
        <header><?php include 'member_header.php' ; ?></header>
            <div class="heading">
                <h1 style="display: inline;">Profile</h1>
         
            </div>
            <form action="update-profile.php" method="post">
                <div class="border">
                    <table>
                    <input type="hidden" name="studentID" value="<?php echo $student_id?>" />
                        <tr>
                            <td>Student ID:</td>
                            <td><?php echo $student_id;?></td>
                        </tr> 
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" value="<?php echo $name;?>" />
                           <span class="error"> <?php echo $namer;?></span>
                        </td>
                        </tr> 
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="<?php echo $email;?>" />
                            <span class="error"> <?php echo $emailr;?></span>
                        </td>
                        </tr>
                    </table>    
                </div>
                <div class="form-button">
                <input type="submit" value="SAVE" name="submit" />
                <input type="button" value="Cancel" onclick="location='member_homepage.php'"/>
    </div>
            </form>
    </body>
   
</html>