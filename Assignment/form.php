<?php
    $iderr=$pswerr='';
    $id=$psw="";
    $error="";
    $pswerr2="";
    
    if(isset($_POST['submit']))
    {
    if(empty(trim($_POST['id']))){
        $iderr='Login ID required';
    }else{
        $id=trim($_POST['id']);
    }
    
    if(empty(trim($_POST['psw']))){
        $pswerr='Password required';
    }else{
        $psw=sha1(trim($_POST['psw']));
    }
  }

  if(!empty($_POST)){
    if(empty($iderr)&&empty($pswerr))
    {
      require_once ('mysqli_connect.php');
  
      $q = "SELECT Password FROM student WHERE StudentID = '$id'";
      $r = @mysqli_query($dbc, $q);
  
      if (mysqli_num_rows($r)==1)
      {
          $row = mysqli_fetch_array($r);
          $password_2 = $row['Password'];

          if ($psw != $password_2){
              $pswerr2 = "Invalid Password.";
          } else {
              session_start();
              $_SESSION['studentID'] = $id;
              header ('location:member_homepage.php');
          }
      } else {
          $error = "Invalid account! Please try again.";
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
  <link href="form.css" rel="stylesheet"/>
  <link href="logo.jpg" rel="shortcut icon" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="page">
  <div class="form-wrap">
      <form action="form.php" method="post">
        <div class="logo">
           <img src="logo.jpg" alt="logo" style="width: 225px;height: 225px;">
        </div>
          <h2>Please Enter Your Information</h2>
                
        <fieldset class="form-row">
          <div class="form">
            <div class="form-element">
                <span class="error"> 
                    <?php   
                    if (!empty($error)){
                        echo  $error;
                    }
                    ?> 
                    </span>
              <input style="font-family: 'Font Awesome 5 free';font-weight: 600;"type="text" id="text" placeholder="&#xf007; Student ID" name="id" value="<?php echo $id ?>">
              <span class="error"><?php echo $iderr;?></span>
            </div>
          </div>
          <div class="form">
            <div class="form-element">
              <input style="font-family: 'Font Awesome 5 free';font-weight: 600;" type="password" placeholder="&#xf023; Password" name="psw">
              <span class="error"><?php echo $pswerr;?></span><span class="error"><?php echo $pswerr2;?></span>
            </div>
          </div>
        </fieldset>
        <div class="login">                      
          <button type="submit" id="btnLogin" class="btn">Log in</button>
          <input type="hidden" name="submit">
        <div class="register">
          <a href="register.php" class="link_btn" style="font: size 0.4em; background-color:#ed9c1b"><span class="link_value">Register</span></a>
        </div> 
        </div>
        <div class="login">
          <a href="adminform.php" class="link-btn" style="font-size: 0.4em; background-color: #de16db"><span class="link-value" id="adminbtn">Admin login</span></a>                     
        </div>  
      </form>   
  </div>
     
</body>
</html>
