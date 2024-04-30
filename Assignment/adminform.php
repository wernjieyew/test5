
<?php
    $iderr=$pswerr='';
    $id=$psw='';
    $error="";
    $pswerr2="";
    if(isset($_POST['submit']))
    {
    if(empty(trim($_POST['id']))){
        $iderr='Admin ID required';
    }else{
        $id=trim($_POST['id']);
    }
    
    if(empty(trim($_POST['psw']))){
        $pswerr='Password required';
    }else{
        $psw=sha1(trim($_POST['psw']));
    }
  }

  if(!empty($_POST))
   if(empty($iderr)&&empty($pswerr)){
    require_once ('mysqli_connect.php');
  
      $q = "SELECT Password FROM admin WHERE adminID = '$id'";
      $r = @mysqli_query($dbc, $q);
  
      if (mysqli_num_rows($r)==1)
      {
          $row = mysqli_fetch_array($r);
          $password_2 = $row['Password'];

          if ($psw != $password_2){
              $pswerr2 = "Invalid Password.";
          } else {
              session_start();
              $_SESSION['adminID'] = $id;
              header ('location:dashboard.php');
          }
      } else {
          $error = "Invalid account! Please try again.";
      }
      mysqli_close($dbc);
   }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="form.css" rel="stylesheet"/>
  <link href="logo.jpg" rel="shortcut icon" />
</head>

<body class="page">
  <div class="form-wrap">
      <form action="adminform.php" method="post">
        <div class="logo">
           <img src="logo.jpg" alt="logo" style="width:250px;height:250px;">
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
              <input type="text" id="text" placeholder="Admin ID" name="id" value="<?php echo $id ?>">
              <span class="error"><?php echo $iderr;?></span>
            </div>
          </div>
          <div class="form">
            <div class="form-element">
              <input type="password" placeholder="Password" name="psw">
              <span class="error"><?php echo $pswerr;?></span><span class="error"><?php echo $pswerr2;?></span>
            </div>
          </div>
        </fieldset>
        <div class="login">                      
          <button type="submit" id="btnLogin" class="btn">Log in</button>
          <input type="hidden" name="submit">
        </div>
          
      </form>   
  </div>
     
</body>
</html>