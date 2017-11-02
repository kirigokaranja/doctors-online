<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
    <style>
        .number{
            margin-left: 40px;
            border: 1px solid blue;
            width: 15%;
            padding: 16px 20px;
            font-size: 18px;
            text-align: center;
        }
        .badge{
            color: white;
            border: solid 1px red;
            background-color: red;
            padding: 3px 10px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<?php

session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
    $id = $_SESSION['email'];

global $db;
$free = "FREE";
$r = mysqli_query($db, "SELECT count(CONSID) FROM medical_details WHERE selected = '$free'");
while($row1 = mysqli_fetch_assoc($r)){
    $bdge = $row1['count(CONSID)'];

    $s = "SELECT * FROM doctor_details WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error."[$s]");


    while($row = mysqli_fetch_array($res)) {
        $name = $row['name'];


        ?>
        <ul>
        <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 120px;margin-top: 30px;" id="output_image" class='image' ">
        <p style="text-align: center; font-size: 20px; color: white;">Doctor <?php echo $name;?></p><?php } ?>
    <li><a  class="active" href="dashboard.php">Dashboard</a></li>
    <li><a href="view_patients.php">Patients <span class="badge" id="spanner"><?php echo $bdge;}?></span></a></li>
    <li><a href="view_feedback.php"> Feedbacks</a></li>
    <li><a href="site.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
    </ul>
    <div class="content">
        <br>
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
    <br><br>
    <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
    <p style="text-align: center"><a href="login.php" style="color: red; font-size: 30px; "> Login</a></p>
<?php } ?>
</body>
</html>