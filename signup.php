<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/signUp.css">
    <style>
        body {margin:0;}

        .topnav {
            overflow: hidden;
            background-color: white;
            height: 100px;
        }

        .topnav a {
            float: right;
            display: block;
            color: blue;
            text-align: center;
            padding: 24px 16px;
            text-decoration: none;
            font-size: 20px;

        }

        .topnav a:hover {
            font-size: 24px;
            bottom: 3px;
            border-bottom: solid blue;
        }

        .topnav .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative; height: 120px;}
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }

        }
    </style>
</head>

<body>
<!-- navbar starts-->
<div class="topnav" id="myTopnav">
    <a style="float: left; padding: 0px 16px; margin-left: 30px;" href="index.php"><img src="image/logo.jpg" height="140"></a>
    <a  style="margin-top: 15px;" href="login.php">Login <img src="image/manuser.png" height="20"></a>
    <a  style="margin-top: 15px; " href="index.php">Home</a>
    <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a> <!-- navbar icon-->
</div>
<!-- navbar ends-->

<div id="wrapper">
    <div id ="outer">

        <div id = "formDiv">
            <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            // error message incase username or password are incorrect

            if(strpos($url,'error=fail')){
                echo "<p style='color:red; font-size:20px;text-align: center;'>Sign up not successful</p>";
            }elseif(strpos($url,'message=success')){
                echo "<p style='color:red; font-size:30px;'>succes </p>";
            }elseif(strpos($url,'error=exists')){
                echo "<p style='color:red; font-size:28px;text-align: center;'>Email already Exists </p>";
            }
            ?>
            <form method="POST" action="add.php" enctype="multiple/form-data">
                <label>First Name</label></br>
                <input class="a" type="text" name="fname" placeholder="Enter your first name" /></br>
                <label>Last Name</label></br>
                <input class="a" type="text" name="lname" placeholder="Enter your last name" /></br>
                <label>Email</label></br>
                <input class="a" type="text" name="email" placeholder="Enter your email"/></br>
                <label>Password</label></br>
                <input class="a" type="password" name="password" placeholder="Enter your password"/></br>
                <label >Gender</label></br>
                <select class="a" name="gender">
                    <option> Gender</option>
                    <option name="gender" value="Male">Male</option>
                    <option name="gender" value="Female">Female</option>
                </select><br>
                <input class="a" type="submit" name="submit"/>
            </form>
</body>
</html>