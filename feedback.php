<html>
<head>
    <style>
        /**navbar starts-- **/
        .topnav {
            overflow: hidden;
            background-color: white;
            height: 100px;
            border-bottom: 1px solid blue;
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
        /**navbar endss-- **/
        body{
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        th {
            background-color:grey;
            color: white;
        }
    </style>
</head>
<?php

session_start();
include ("connect.php");


if(isset($_SESSION['custID'])){
    $custid = $_SESSION['custID'];
    ?>
<body>
<!-- navbar starts-->
<div class="topnav" id="myTopnav">
    <a style="float: left; padding: 0px 16px; margin-left: 30px;" href="index.php"><img src="image/logo.jpg" height="140"></a>
    <a  style="margin-top: 15px; " href="logout.php">logout</a>
    <a  style="margin-top: 15px; " href="medicalform.php">Consult a Doctor</a>
    <a  style="margin-top: 15px;" href="feedback.php">Feedback </a>
    <a  style="margin-top: 15px; " href="index.php">Home</a>
    <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a> <!-- navbar icon-->
</div>
<!-- navbar ends--><br>
<h1> Consult Feedback</h1>
<table>
    <tr>
        <th>Feedback Date</th>
        <th>Symptoms</th>
        <th>Feedback</th>
        <th>Doctor ID</th>
        <th>Doctor's Name</th>
    </tr>
    <?php


    $sql = "SELECT * FROM feedback WHERE `custID` = '$custid'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");


    while($row = mysqli_fetch_array($result)){

    $feedid= $row['feedbackID'];
    $custmerid = $row['custID'];
    $doctid = $row['doctID'];
    $feedback = $row['feedback'];
    $symptoms =  $row['symptoms'];
    $date = $row['date'];

    $sql1 = "SELECT * FROM doctor_details WHERE `doctID` = '$doctid'";
    global $db;
    $result1 = $db->query($sql1) or trigger_error($db->error."[$sql1]");


    while($row = mysqli_fetch_array($result1)){
        $docname = $row['name'];
    ?>
    <tr>
    <tr>
        <td><?php echo $date; ?></td>
        <td><?php echo $symptoms; ?></td>
        <td><?php echo $feedback; ?></td>
        <td><?php echo $doctid; ?></td>
        <td><?php echo $docname; ?></td>

        <?php }?>
        <?php }?>
    </tr>
</table>
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