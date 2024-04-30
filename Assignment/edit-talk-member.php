<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

        $event_name = $_REQUEST["name"];
        $event_id = $_REQUEST["id"];
        $event_type=$_REQUEST["type"];
        $student_id =$_REQUEST["student"];
        $student_name = "";
        $email = "";
        $phone = "";
        $gender="";

        $student_idr = $student_namer =$emailr = $phoner=  $genderr="";

        if (!empty($_POST)){
            $student_name = ($_POST['student_name']);
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
            }

            if($student_name == null){
                $student_namer = 'Student name required';
            }else if(!preg_match("/^[a-zA-Z-' ]*$/",$student_name)){
                $student_namer = 'Invalid name format';
            }

            if(!isset($_POST['gender'])){
                $genderr="Please choose a gender";
            }

            if($phone == null){
                $phoner = 'Phone number required';
            }else if (!preg_match('/^01\d{8}$/', $phone)){
                $phoner = "invalid phone number";
            }

             if($email == null){
                $emailr = 'Email required';
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailr = 'Invalid email format';
            }

            if(empty($student_namer)&&empty($emailr)&&empty($phoner)&&empty($genderr)){

                $q = "UPDATE participant SET Event_id='$event_id',
                Event_name='$event_name',
                Event_type='$event_type',
                studentID='$student_id',
                studentname='$student_name',
                email='$email',
                phone_no='$phone',
                gender='$gender' WHERE Event_id='$event_id' AND studentID='$student_id'";
                $r = @mysqli_query($dbc,$q);

                if($r){
                    echo "<script type='text/javascript'>
                    alert('Update sucessful');
                    document.location.href='talk.php'
                 </script>"; 
                }else{
                     echo"<script type='text/javascript'>
                     alert('update failed');
                     document.location.href='talk.php'
                  </script>";
                }
                $r=@mysqli_query($dbc,$q);
             }
              mysqli_close($dbc);
    }
    $q="SELECT * FROM participant WHERE Event_id='$event_id' AND studentID='$student_id'";
    $r=mysqli_query($dbc,$q);

    if(mysqli_num_rows($r)==1){
        $row=mysqli_fetch_array($r);
        $event_id=$row['Event_id'];
        $event_name=$row['Event_name'];
        $event_type=$row['Event_type'];
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
              
             <form method="post" action="edit-talk-member.php">  
                 <div class="h">  
              <h1>Edit Participant Information</h1>
              <input type="hidden" name="id" value="<?php echo $event_id?>" />
              <input type="hidden" name="name" value="<?php echo $event_name?>" />
              <input type="hidden" name="type" value="<?php echo $event_type?>" />
             </div> 
              
              <label for="studentid"><b>Student ID</b></label> 
               <br>
               <?php echo $student_id?>
               <input type="hidden" name="student" value="<?php echo $student_id?>" />
              <br>
              <br>
               <label for="name"><b>Name</b></label> 
              <br>  
              <input type="text" name="student_name"placeholder="Enter name" value="<?php echo $student_name;?>"> <br>
              <span class="error"><?php echo $student_namer;?></span>
               <br>
               
               <label for="gender"><b>Gender</b></label> 
              <br>  
                <input type="radio" name="gender" value="F" <?php if($gender=='F') echo 'checked="checked"'; ?> />Female
                <input type="radio" name="gender" value="M" <?php if($gender=='M') echo 'checked="checked"'; ?> />Male<br>
                <span class="error"><?php echo $genderr;?></span>
               <br>

              <label for="email"><b>Email</b></label>
               <br>
              <input type="text" placeholder="e.g: XXX@abc.com" name="email" id="email" value="<?php echo $email;?>"><br>
              <span class="error"><?php echo $emailr;?></span>
               <br>
           
              <label for="phone"><b>Phone no</b></label>
               <br>
              <input type="text" placeholder="01XXXXXXXX" name="phone" id="phone" value="<?php echo $phone;?>"><br>
              <span class="error"><?php echo $phoner;?></span>
               <br>
              <button type="submit" name="submit"class="reg"><b>Save</b></button><br>
              <input type="button" value="Cancel" onclick="location='talk.php'"/>
              </div>
        </form>
       </div> 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </body>
    
</html>