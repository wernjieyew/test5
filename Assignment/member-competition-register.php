<?php require_once ('mysqli_connect.php');
session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}
        $event_id = $_REQUEST["id"];
        $event_name = $_REQUEST["name"];
        $event_type=$_REQUEST["type"];
        $student_id = "";
        $student_name = "";
        $email = "";
        $phone = "";
        $gender="";

        $student_idr = $student_namer =$emailr = $phoner=  $genderr="";

        if (!empty($_POST)){
            $student_id = ($_POST['student_id']);
            $student_name = ($_POST['student_name']);
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
            }

            if($student_id == null){
                $student_idr = 'Student ID required';
            }else if(!preg_match("/^\d{7}$/", $student_id)){
                $student_idr = 'Invalid format.Please enter without alphabet';
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

            if( empty($student_idr)&& empty($student_namer)&&empty($emailr)&&empty($phoner)&&empty($genderr)){

                $q = "INSERT INTO participant(Event_id,Event_name,studentID,Event_type,studentname,gender,email, phone_no) 
                VALUES('$event_id','$event_name','$student_id','$event_type','$student_name','$gender', '$email', '$phone')";
                $r = @mysqli_query($dbc,$q);

                if($r){
                    echo "<script type='text/javascript'>
                    alert('Register sucessful');
                    window.close();
                 </script>"; 
                }else{
                     echo"<script type='text/javascript'>
                     alert('Register failed');
                     document.location.href='member-competition-register'
                  </script>";
                }
                $r=@mysqli_query($dbc,$q);
        }
    }
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
        </style>
        
    </head>
    <body>
        
        <header><?php include 'member_header.php' ; ?></header>
        
        <div class="c"> 
              
             <form method="post" action="member-competition-register.php">  
                 <div class="h">  
              <h1>Register</h1>
              <input type="hidden" name="id" value="<?php echo $event_id?>" />
              <input type="hidden" name="name" value="<?php echo $event_name?>" />
              <input type="hidden" name="type" value="<?php echo $event_type?>" />
                 </div> 
              
              <label for="studentid"><b>Enter Student ID</b></label> 
               <br>
              <input type="text" name="student_id" placeholder="Enter Student ID" value="<?php echo $student_id;?>"> <br>
              <span class="error"><?php echo $student_idr;?></span>
              <br>
              
               <label for="name"><b>Enter name</b></label> 
              <br>  
              <input type="text" name="student_name"placeholder="Enter name" value="<?php echo $student_name;?>"> <br>
              <span class="error"><?php echo $student_namer;?></span>
               <br>
               
               <label for="gender"><b>Select Gender</b></label> 
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
              <button type="submit" name="submit"class="reg"><b>Register</b></button>
              <button type="reset" name="reset" class="res"><b>Reset</b></button>
              </div>
        </form>
       </div> 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer><?php include 'member_footer.php' ; ?></footer>
    </body>
    
</html>