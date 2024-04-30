<?php
session_start();
if(empty($_SESSION))
{
    header("Location: form.php");
}

$studentid=$fullname = $gender = $email  = $feedback = "";
$studentidr=$fullnamer = $genderr = $emailr  = $feedbackr = "";
if (!empty($_POST)) {
  $studentid = trim($_POST['studentid']);  
  $fullname = trim($_POST['fullname']);
  if (isset($_POST['gender']))
            {
                $gender = $_POST['gender'];
            }
  $email  = trim($_POST['email']);
  $feedback  = trim($_POST['feedback']);

  if($studentid == null){
    $studentidr = '*Student ID required'; 
  } else if(!preg_match("/^\d{7}$/", $studentid)){
    $studentidr = '*Invalid format. Enter without alphabet';
  }
  if($fullname==NULL){
    $fullnamer="* full name required";
  }else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $fullname)){
    $fullnamer = '*Invalid name';
  }
  if($gender==NULL){
    $genderr="* gender required";
  }
  if($email == null){
      $emailr = "* email required";
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailr= "* Invalid email";
  }
  if($feedback==NULL){
    $feedbackr="* Please give some feedback";
  }
  if(empty($fullnamer)&&empty($studentidr)&&empty($emailr)&&empty($feedbackr)&&empty($genderr)){
    require_once ('mysqli_connect.php'); 
    $q = "INSERT INTO feedback(studentID,fullname,gender,email, comment) VALUES('$studentid','$fullname','$gender', '$email', '$feedback')";
    $r = @mysqli_query($dbc,$q);
    
    if($r){
      echo "<script type='text/javascript'>
      alert('Thank you for your feedback');
      document.location.href='member_homepage.php'
   </script>"; 
  }else{
       echo"<script type='text/javascript'>
       alert('unknown error');
       document.location.href='member-feedback.php'
    </script>";
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
    <link href="logo.jpg" rel="shortcut icon" />
    <link href="add-event-sucessfull.css" rel="stylesheet" type="text/css" />
    <link href="logo.jpg" rel="shortcut icon" />
    <style>
        .feedback-content {
            background: #f1f1f1;
            padding: 50px;
            max-width: 800px;
            margin: 0 auto;
        }

        .form_button input[type='submit'] {
            font-size: 1.2em;
            padding: 5px;
            margin: 5px;
            margin-bottom: 15px;
            background: rgb(107, 107, 107);
            color: white;
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%
        }

        input[type=text],
        input[type=email],
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;

        }

        .error {
            color: red;
            padding-top: 5px;
        }

        .form_button {
            text-align: center;
        }

        .form_button input[type='submit'] {
            margin-top: 15px;
        }
    </style>
</head>

<body class="page">
    <header>
        <?php include 'member_header.php'; ?>
    </header>

    <div class="out_border">
        <form action="member-feedback.php" method="post">
            <div class="feedback-content">
                <div class="form_group">
                <h2>Member Feedback</h2>
    </div>
    <div class="form_group">
      <label for="studentid">Student ID:</label>
      <input type="text" id="studentid" name="studentid" value="<?php echo $studentid; ?>">
      <div class="error"><?php echo $studentidr; ?></div>
    </div>

    <div class="form_group">
      <label for="fullname">Full Name:</label>
      <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
      <div class="error"><?php echo $fullnamer; ?></div>
    </div>

    <div class="form_group">
      <label for="gender">Gender:</label>
      <input type="radio" id="gender_male" name="gender" value="male" <?php if ($gender == "Male") echo "checked"; ?>>
      <label for="gender_male">Male</label>
      <input type="radio" id="gender_female" name="gender" value="female" <?php if ($gender == "Female") echo "checked"; ?>>
      <label for="gender_female">Female</label>
      <div class="error"><?php echo $genderr; ?></div>
    </div>

    <div class="form_group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>">
      <div class="error"><?php echo $emailr; ?></div>
    </div>

    <div class="form_group">
      <label for="feedback">Comment:</label>
      <textarea id="feedback" name="feedback"><?php echo $feedback; ?></textarea>
      <div class="error"><?php echo $feedbackr; ?></div>
    </div>

    <div class="form_button">
      <input type="submit" value="Submit">
      <input type="reset" value="Reset">
    </div>
</div>
</form>
</div>
<footer>

<?php include 'member_footer.php'; ?>
</footer>

</body>
</html>