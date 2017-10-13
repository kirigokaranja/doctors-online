<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">

</head>
<body>
<?php

session_start();
include ("connect.php");


if(isset($_SESSION['user_type'])){ ?>
<ul>
    <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 120px;margin-top: 30px;" id="output_image" class='image' ">
    <p style="text-align: center; font-size: 20px; color: white;">Administrator</p>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a class="active "href="add_doctor.php">Add Doctor</a></li>
    <li><a href="view_doctor.php">View Doctors</a></li>
    <li><a href="message.php"> Messages</a></li>
    <li><a href="../index.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
</ul>
<div class="content">
    <br>
    <h1 id="prof">Add Doctor<h1>

            <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            // error message incase username or password are incorrect

            if(strpos($url,'error=fail')){
                echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
            }elseif(strpos($url,'message=success')){
                echo "<p style='color:red; font-size:30px;text-align: center;'>Doctor Successfully Added </p>";
            }
            ?>
            <form  action="add_doctor_action.php" method="post" enctype="multipart/form-data">
                <fieldset class="new">
                    <br>
                    <label>Name:</label><br>
                    <input type="text" name="name"><br><br>
                    <label>Email:</label><br>
                    <input type="email" name="email"><br><br>
                    <label>Phone Number:</label><br>
                    <input type="text" name="phone"><br><br>
                    <label>Gender:</label><br>
                    <input type="text" name="gender"><br><br>
                    <label>Password:</label><br>
                    <input type="text" name="password"><br><br>
                    <input type="submit" name="add" value="Add Doctor" style="width: 350px;">
                </fieldset>

            </form>
</div>
<?php
}else{

    session_destroy();


    ?>
    <div style="margin-top: 15%; border: 1px solid lightblue; width: 50%; margin-left: 25%">
        <br><br>
        <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
        <p style="text-align: center"><a href="login.php" style="color: red; font-size: 30px; "> Login</a></p>
    </div>
<?php } ?>
</body>
</html>