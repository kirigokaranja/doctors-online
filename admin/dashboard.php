<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/dropdown.css">
    <style>
        .number{
            margin-left: 40px;
            border: 1px solid blue;
            width: 15%;
            padding: 16px 20px;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php

session_start();
include ("connect.php");


if(isset($_SESSION['user_type'])){ ?>
<ul>
    <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 80px;margin-top: 30px;" id="output_image" class='image' ">
    <p style="text-align: center; font-size: 20px; color: white;">Administrator</p>
    <li><a  class="active" href="dashboard.php">Dashboard</a></li>
    <li><a href="add_doctor.php">Add Doctor</a></li>
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
    <img src="../image/logo.jpg" height="120" style="float: left;margin-left: 10%;"><br><br>
    <h1 id="prof">DashBoard<h1>
            <?php

            include 'connect.php';
            global $db;
            $r = mysqli_query($db, "SELECT count(doctID) FROM doctor_details");
            while($row1 = mysqli_fetch_assoc($r)){
                ?>
                <p class="number">
                     Number of Doctors: <?php echo $row1['count(doctID)'];?>
                </p>
                <br>
            <?php }?>
            <?php
            $r = mysqli_query($db, "SELECT count(custID) FROM personal_details");
            while($row1 = mysqli_fetch_assoc($r)){
            ?>

            <p class="number">
                Number of Total Users: <?php echo $row1['count(custID)'];?>
            </p><br>
            <?php }?>
            <?php
            $r = mysqli_query($db, "SELECT count(CONSID) FROM medical_details");
            while($row1 = mysqli_fetch_assoc($r)){
                ?>

                <p class="number">
                    Number of Total Consults: <?php echo $row1['count(CONSID)'];?>
                </p>
            <?php }?>


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