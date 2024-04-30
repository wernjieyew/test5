<?php
$fullname=$studentID=$email=$password=$confirmpass="";
$fullnamer=$studentIDr=$emailr=$passwordr=$confirmpassr="";

if(!empty($_POST))
    {
      $fullname = trim($_POST['fullname']);
      $studentID = trim($_POST['studentID']);  
      $email  = trim($_POST['email']);
      $password  = trim($_POST['password']);
      $confirmpass  = trim($_POST['confirmpass']);
     
      if($fullname == null){
        $fullnamer = '*Full name required'; 
      }else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $fullname)){
        $$fullnamer = '*Invalid name';
    }
      if($studentID == null){
        $studentIDr = '*Student ID required'; 
      } else if(!preg_match("/^\d{7}$/", $studentID)){
        $studentIDr = '*Invalid format. Enter without alphabet';
      }
  
      if($email == null){
        $emailr = '*email required';
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailr= '*Invalid email';
      }
  
      if($password == null) {
        $passwordr = '*password required';
          
      }elseif(strlen($password)<8){
        $passwordr = '* password must at least 8 character';    
      }elseif($password != $confirmpass) {
        $confirmpassr = '* Confirm password different with password';
      } else {
        $password = trim($_POST['password']);
    } 
    
    if(empty($fullnamer)&&empty($studentIDr)&&empty($emailr)&&empty($passwordr)&&empty($confirmpassr)){
      require_once ('mysqli_connect.php'); 
      $q = "INSERT INTO student(studentID,Fullname, Email, Password) VALUES('$studentID','$fullname', '$email', sha1('$password'))";
      $r = @mysqli_query($dbc,$q);
      
      if($r) {
        header('location:signsucessful.php');
    } else {
        echo '<h1>Unknow Error!</h1>';
    }
    mysqli_close($dbc);
  }
  }
  
  ?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="register.css" rel="stylesheet" />
      <link href="logo.jpg" rel="shortcut icon" />
    </head>
    <style>
         
    </style>
    <body class="page">
      <div class="sign-wrap">
        <form action="register.php" method="post">
          <h2>Sign Up</h2>

          <fieldset class="form-row">
            <div class="form-element">
             <input type="text" class="form-control" placeholder=" Full Name" id="fullname" name="fullname" value="<?php echo $fullname;?>">
             <span class="error"><?php echo $fullnamer;?></span>
            </div>
            <div class="form-element">
              <input type="text" class="form-control" placeholder=" Student ID" id="studentID" name="studentID" value="<?php echo $studentID;?>">
              <span class="error"><?php echo $studentIDr;?>   </span>
            </div>
          </fieldset>

          <fieldset class="form-row">
            <div class="form-element">
             <input type="text" class="form-control" placeholder=" Email" id="email" name="email"value="<?php echo $email;?>">
             <span class="error"><?php echo $emailr;?>   </span>
            </div>
          </fieldset>

          <fieldset class="form-row">
            <div class="form-element">
             <input type="password" class="form-control" placeholder=" Password" id="password" name="password">
             <span class="error"><?php echo $passwordr;?>   </span>
            </div>
            <div class="form-element">
              <input type="password" class="form-control" placeholder=" Confirm Password" id="confirmpass" name="confirmpass">
              <span class="error"><?php echo $confirmpassr;?>   </span>
            </div>
          </fieldset>
          <div class="sign">
            <button type="submit" class="button">Sign up</button>
              <input type="hidden" name="submit">
          </div>            
        </form>
      </div>
    </body>
</html>