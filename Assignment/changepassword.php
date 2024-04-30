<?php session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}?>
<?php require_once ('mysqli_connect.php');
$student_id=$_SESSION['studentID'];
$currentpass=$newpass=$confirmpass="";
$currentpassr=$newpassr=$confirmpassr="";



if(!empty($_POST))
{
    $currentpass=trim($_POST['currentpass']);
    $newpass=trim($_POST['newpass']);
    $confirmpass=trim($_POST['confirmpass']);
    
if($currentpass==null){
    $currentpassr='* Current Password required';
}else{
    $currentpass=sha1(trim($_POST['currentpass']));
}

if($newpass==null){
    $newpassr='* New Password required';
}elseif(strlen($newpass)<8){
    $newpassr = '* password must at least 8 character';   
}elseif($newpass != $confirmpass) {
    $confirmpassr = '* Confirm password different with password';
}else{
    $newpass=sha1(trim($_POST['newpass']));
}

if($confirmpass==null){
    $confirmpassr='* Confirm Password required';
}
}

if(!empty($_POST)){
    if(empty($currentpassr)&&empty($newpassr)&&empty($confirmpassr))
    {
      require_once ('mysqli_connect.php');
  
      $q = "SELECT Password FROM student WHERE StudentID = '$student_id'";
      $r = @mysqli_query($dbc, $q);
  
      if (mysqli_num_rows($r)==1)
      {
          $row = mysqli_fetch_array($r);
          $password_2 = $row['Password'];

          if ($currentpass != $password_2){
              $currentpassr = "Invalid Password.";
          } else {
            $q="UPDATE student SET studentID='$student_id',
            Password='$newpass'WHERE studentID='$student_id'";
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

    }
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
            background-color:white;
        }
    
        .heading{
            text-align:center;
            margin-top:100px;
        }
        td {
            height: 50px;
            text-align:center;
            width:100px;
            color:black;
        }
        .error{
            color:rgb(246, 1, 1);
        }
        input[type='password']{
            height:30px;
            width:200px;
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
                <h1 style="display: inline;">Change Password</h1>
            </div>
            <form action="changepassword.php" method="post">
                <div class="border">
                    <table>
                        <tr>
                            <td>Current Password:</td>
                            <td><input type="password" name="currentpass" placeholder="Current Password">
                            <span class="error"> <?php echo $currentpassr;?></span></td>
                        </tr> 
                        <tr>
                            <td>New<br>Password:</td>
                            <td><input type="password" name="newpass" placeholder="New Password">
                           <span class="error"> <?php echo $newpassr;?></span>
                        </td>
                        </tr> 
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" name="confirmpass" placeholder="Confirm Password">
                            <span class="error"> <?php echo $confirmpassr;?></span>
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