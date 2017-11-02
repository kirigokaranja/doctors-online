<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/dropdown.css">
    <style>
        body{
            background-image: url("../image/ste.jpg");
            background-repeat: no-repeat;
            margin:0;
            font-family: 'Montserrat', sans-serif;
        }
        /** form starts **/

        fieldset{
            border-radius: 8px;
            width: 90%;
            margin-left: 5%;
            background-color: whitesmoke;
            opacity: 0.9;
        }
        input[type=submit]{
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 25%;
        }
        input[type=submit]:hover{
            opacity: 0.3;
        }
        input[type=text],input[type=email] , textarea{
            width: 30%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top:  6px;
            margin-bottom: 16px;
            resize: vertical;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<?php

session_start();
include ("connect.php");


if(isset($_SESSION['user_type'])){ ?>
<ul>
    <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 90px;margin-top: 30px;" id="output_image" class='image' ">
    <p style="text-align: center; font-size: 20px; color: white;">Administrator</p>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a class="active "href="add_doctor.php">Add Doctor</a></li>
    <div class="dropdown">
        <li><a  href="view_doctor.php">View Doctors</a></li>
        <div class="dropdown-content">
            <a href="">Inactive Doctors</a>
        </div>
    </div>
    <li><a href="message.php"> Messages</a></li>
    <li><a href="../index.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
</ul>
<div class="content">
    <br><div class="medform">
        <img src="../image/logo.jpg" height="120" style="float: left;margin-left: 10%;">
        <h1 id="prof" >Add Doctor</h1>

            <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            // error message incase username or password are incorrect

            if(strpos($url,'error=fail')){
                echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
            }elseif(strpos($url,'message=success')){
                echo "<p style='color:red; font-size:30px;text-align: center;'>Doctor Successfully Added </p>";
            }
            ?>
            <div class="form">
            <form  action="add_doctor_action.php" method="post" enctype="multipart/form-data">
                <fieldset class="new">
                    <br>
                    <label>Name:</label>
                    <input type="text" name="name">
                    <label>Email:</label>
                    <input type="email" name="email"><br><br>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label>Phone Number:</label><br>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="phone"><br><br>
                    <label>Gender:</label>
                    <input type="text" name="gender">
                    <label>Password:</label>
                    <input type="text" name="password"><br><br>
                    <input type="submit" name="add" value="Add Doctor" style="width: 350px;">
                </fieldset>

            </form>
            </div>
        </div>
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