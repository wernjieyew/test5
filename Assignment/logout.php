<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location:form.php');
        ?>
    </body>
</html>
