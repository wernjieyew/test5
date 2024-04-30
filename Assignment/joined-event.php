<?php session_start();
if(empty($_SESSION))
{
    header("Location: adminform.php");
}?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="joined-event.css" rel="stylesheet" type="text/css" />
        <link href="logo.jpg" rel="shortcut icon" />
    </head>
    <body>
       
        <header><?php include 'admin-header.php' ; ?></header>
        
        <div class="tabs">
            <input type="radio" id="tab_competition" name="tabs" checked="checked"/>
            <label for="tab_competition">Competition</label>
            <div class="embeded_website">
                <iframe scrolling="no" src="competition.php" style="width: 100%; overflow: hidden; border: 0px none; height: 900px;"></iframe>
            </div>
            
            <input type="radio" id="tab_workshop" name="tabs" checked="checked"/>
            <label for="tab_workshop">Workshop</label>
            <div class="embeded_website">
                <iframe scrolling="no" src="workshop.php" style="width: 100%; overflow: hidden; border: 0px none; height: 900px;"></iframe>
            </div>

            <input type="radio" id="tab_talk" name="tabs" checked="checked"/>
            <label for="tab_talk">Talk</label>
            <div class="embeded_website">
                <iframe scrolling="no" src="talk.php" style="width: 100%; overflow: hidden; border: 0px none; height: 900px;"></iframe>
            </div>
        </div>
        
    </body>
</html>