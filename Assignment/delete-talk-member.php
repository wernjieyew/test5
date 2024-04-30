<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

$event_id = $_REQUEST["id"];
$event_name = $_REQUEST["name"];
$event_type=$_REQUEST["type"];
$student_id =$_REQUEST["student"]; 

    if(!empty($_POST)){

        $q = "DELETE FROM participant WHERE Event_id='$event_id' AND studentID='$student_id'";
        $r = @mysqli_query($dbc,$q);

        if($r){
            echo "<script type='text/javascript'>
            alert('Delete sucessful');
            document.location.href='talk.php'
            </script>"; 
        }else{
                echo"<script type='text/javascript'>
                alert('Delete failed');
                document.location.href='talk.php'
            </script>";
        }
        $r=@mysqli_query($dbc,$q);
        }
    $q="SELECT * FROM participant WHERE Event_id='$event_id' AND studentID='$student_id'";
    $r=mysqli_query($dbc,$q);

    if(mysqli_num_rows($r)==1){
        $row=mysqli_fetch_array($r);
        $student_name=$row['studentname'];
        $gender= $row['gender'];
        $email=$row['email']; 
        $phone= $row['phone_no'];
    }
mysqli_free_result($r);
mysqli_close($dbc);
        ?>

<!DOCTYPE html>

<html>
    <head>
       
        <meta charset="UTF-8">
        <link href="member-event-register.css" rel="stylesheet" />
        <link href="logo.jpg" rel="shortcut icon" />
        <style>
            body {
          font-family: Arial, Helvetica, sans-serif;               
        }
        
         input[type=text],input[type=gender] ,input[type=email]{
          width: 52%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
         text-align:center;
        }  
        input[type=radio] {
            border: 0px;
            width: 5%;
            height: 1.2em;
        }
        button{
            text-align:center;
        }
        .error{
            font-size: 16px;
            color:red;
        }
        table{
            margin-left: auto;
             margin-right: auto;
             text-align:left;
        }
        td{
            width:150px;
            height:35px;
        }
        input[type='button']{
            background-color: white;
            color: black;
            padding: 15px 20px ;
            margin: 8px 0;
            width: 50%;
            border: 2px solid ;
        }
        </style>
        
    </head>
    <body>  
        <div class="c"> 
              
             <form method="post" action="delete-talk-member.php">  
                 <div class="h">  
              <h1>Delete student from Event?</h1>
              <input type="hidden" name="id" value="<?php echo $event_id?>" />
              <input type="hidden" name="type" value="<?php echo $event_type?>" />
             </div> 
             <table border="0" cellpadding="6">
            <tr>
             <td><label for="event_name"><b>Event Name</b></label></td> 
             <td><?php echo $event_name;?>
             <input type="hidden" name="name" value="<?php echo $event_name?>" /></td>
             
             <tr>
             <td><label for="studentid"><b>Student ID</b></label> </td>
               <td><?php echo $student_id;?>
               <input type="hidden" name="student" value="<?php echo $student_id?>" /></td>
            </tr>

               <tr>
              <td><label for="name"><b>Name</b></label> </td>
              <td><?php echo $student_name;?> </td>
                </tr>

              <tr>
              <td><label for="gender"><b>Gender</b></label> </td> 
              <td><?php echo $gender;?></td>
                </tr>

              <tr>
               <td><label for="email"><b>Email</b></label></td>
               <td><?php echo $email;?> </td>
               </tr>

               <tr>
               <td><label for="phone"><b>Phone no</b></label></td>
               <td><?php echo $phone;?></td>
               </tr>
    </table>
              <button type="submit" name="submit"class="reg"><b>Delete</b></button>
              <input type="button" value="Cancel" onclick="location='talk.php'"/>
              </div>
        </form>
       </div> 
    </body>
    
</html>