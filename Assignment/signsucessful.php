<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    </head>
    <style>
       body{
        background-image:url('background.jpg');
        background-repeat:no-repeat;
        background-size:100% 250%;
        }
        .container{
            height:300px;
            width:60%;   
            background-color:rgb(122, 182, 172); 
            color:rgb(42, 4, 81);
            text-align:center;
            padding: 50px;
            display:block;
            margin: auto;
            font-family: Open-Sans,sans-serif;
            font-size: 1.4em;
            line-height: 1.6;
            box-sizing: border-box;
            position: relative;
            padding-top: 20px;
            margin-top: 200px;
        } 
        input[type="submit"]{
            width:15em;
            height:3em;
            background-color:rgb(38, 5, 134);
            font-size:16px;
            font-weight:900;
            color:rgb(251, 10, 247);
        }
    </style>
    <body>
        <div class="container">
            <form action="form.php">
                <h1>Welcome to Music Society</h1>
                <p>You has sucessfully register as a Music Society member now.<br>
                    You can login in now to see more information.</p>
                <div class="login">   
                    <input type="submit" value="&#129144; Login now">
                </div>
            </form>
        </div>
    </body>
</html>