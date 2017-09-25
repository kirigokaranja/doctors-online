<?php

include ("connect.php");

if(isset($_POST['submit'])){
    $uname = $_POST['UserName'];
    $upass = $_POST['password'];

    $sql = "SELECT * FROM `personal_details` WHERE `email`='$uname'and `password`='$upass'";
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");
    if($result && $row = $result->fetch_assoc()){
        if(isset($_POST['remember'])){
            setcookie("UserName",$uname, time()+3600,"/","",0);
        }
        session_start();
        $user = $row['UserName'];
        $_SESSION['UserName'] = $user;
        header("Location:medicalform.php");
    }
    else {
        header("Location:login.php?error=wrong");

    }

}
?>

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
        <form action="login.php" method="POST">
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
