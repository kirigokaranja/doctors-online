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

</head>
<body>

<div class='myform'>
    <section id="body_wrap">
        <form action="login_action.php" method="POST">
            <h1 id="head" style="text-align: center;">Login</h1>
            <br><br>
            <input type="email" name="UserName" id="uname"  placeholder="Enter email"> <br><br>
            <input type="password" name="password" id="Pass" placeholder="Enter Password"><br><br>
            <input type="checkbox" name="remember">&nbsp;&nbsp;&nbsp;&nbsp;Remember me.<br><br>
            <input type="submit" name="submit" id="login" value="Login"><br><br>
            <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
            <br><br>
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
