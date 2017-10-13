<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style>
        input[type=password], input[type=email]{
            padding: 12px 10px;
            height: 25px;
        }
    </style>
</head>
<body>

<div class='myform'>
    <section id="body_wrap">
        <form action="login_action.php" method="POST">
            <h1 id="head" style="text-align: center;">Login</h1>
            <br><br>
            <input type="email" name="uname" id="uname"  placeholder="Enter email"> <br><br>
            <input type="password" name="pass" id="pass" placeholder="Enter Password"><br><br><br>
            <button type="submit" name="submit" id="login" style="height: 35px;">Login</button><br><br>

            <div id="error message">
                <?php
                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

                // error message incase username or password are incorrect

                if(strpos($url,'error=wrong')){
                    echo "<p style='color:red; font-size:20px;'>Username or Password are incorrect </p>";
                }elseif(strpos($url,'message=sucess')){
                    echo "<p style='color:red; font-size:30px;'>Login is Successful </p>";
                }
                ?>
            </div>

        </form>
    </section>
</div>
</body>
</html>