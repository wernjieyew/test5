<?php session_start();

if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<?php require_once ('mysqli_connect.php');

    $q="SELECT * FROM student";
    $r=mysqli_query($dbc,$q);
    $num=mysqli_num_rows($r);

    $q="SELECT * FROM event";
    $r=mysqli_query($dbc,$q);
    $num2=mysqli_num_rows($r);
    
    $q="SELECT * FROM feedback";
    $r=mysqli_query($dbc,$q);
    $num3=mysqli_num_rows($r);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="logo.jpg" rel="shortcut icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
           .r_message .m_list {
            height: 99px;
            float: left;
            margin-left: 300px;
            margin-top: 100px;
        }

        .r_message .m_1 {
            width: 22%;
            background: #27a9e3;
        }

        .r_message .m_list .m_desc h1 {
            color:white;
            padding-left:100px;
            padding-top:11px;
            text-align:center;
        }
        .r_message .m_list .m_pic {
            width: 44px;
            height: 46px;
            float: left;
            margin: 25px 10px 0 20px;
            color:white;
        }
        .r_message .m_2 {
            width: 22%;
            background: #28b779;
        }
        .r_message .m_3 {
            width: 22%;
            background: rgb(250, 149, 7);
            height:30%;
            margin-left:625px;
        }
        </style>
    <body>
    <header><?php include 'admin-header.php' ; ?></header>
    <div class="r_message">
                <div class="m_list m_1">
                    <div class="m_pic"><i class="ace-icon fa fa-user fa-4x"></i></div>
                    <div class="m_desc">
                        <h1>Total Member</h1>
                        <h1><?php echo $num;?></h1> 
                    </div>
                </div>

                <div class="m_list m_2">
                    <div class="m_pic"><i class="fa fa-calendar fa-4x"></i></div>
                    <div class="m_desc">
                        <h1>Total Event</h1>
                        <h1><?php echo $num2;?></h1> 
                    </div>
                </div>

                <div class="m_list m_3">
                    <div class="m_pic"><i class="fa fa-comments fa-4x"></i></i></div>
                    <div class="m_desc">
                        <h1>Total Feedback</h1>
                        <h1><?php echo $num3;?></h1> 
                    </div>
                </div>
    </div>
    </body>
</html>