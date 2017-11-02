<html>
<head>
    <title></title>
    <link href="css/doctor.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php

session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
    $id = $_SESSION['email'];

    $s = "SELECT * FROM doctor_details WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error."[$s]");


    while($row = mysqli_fetch_array($res)) {
        $name = $row['name'];
        $docid = $row['doctID'];

        global $db;
        $free = "FREE";
        $r = mysqli_query($db, "SELECT count(CONSID) FROM medical_details WHERE selected = '$free'");
        while($row1 = mysqli_fetch_assoc($r)){
            $bdge = $row1['count(CONSID)'];
        ?>
        <ul>
        <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 120px;margin-top: 30px;" id="output_image" class='image' ">
        <p style="text-align: center; font-size: 20px; color: white;">Doctor <?php echo $name;?></p>
    <li><a  href="dashboard.php">Dashboard</a></li>
    <li><a  href="view_patients.php">View Patients &emsp;<span class="badge" id="spanner"><?php echo $bdge;}?></span></a></li>
    <li><a  class="active" href="view_feedback.php">Feedbacks</a></li>
    <li><a href="site.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
    </ul>
    <div class="content">
        <br><br>
        <h1 style="text-align: center">Doctor's Feedbacks</h1>
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        // error message incase username or password are incorrect

        if(strpos($url,'error=fail')){
            echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
        }elseif(strpos($url,'message=success')){
            echo "<p style='color:red; font-size:30px;text-align: center;'>Feedback sent Successfully</p>";
        }
        ?>
        <table>
            <tr>
                <th>Date</th>
                <th>Patient ID</th>
                <th>Feedback ID</th>
                <th>Symptoms</th>
                <th>Feedback</th>

            </tr>
            <?php


            $sql = "SELECT * FROM feedback WHERE `doctID` = '$docid'";
            global $db;
            $result = $db->query($sql) or trigger_error($db->error."[$sql]");


            while($row = mysqli_fetch_array($result)){

            $feedid= $row['feedbackID'];
            $custid = $row['custID'];
            $doctid = $row['doctID'];
            $feedback = $row['feedback'];
            $symptoms =  $row['symptoms'];
            $date = $row['date'];

            ?>
            <tr>
                <td><?php echo $date; ?></td>
                <td><?php echo $custid; ?></td>
                <td><?php echo $feedid; ?></td>
                <td><?php echo $symptoms; ?></td>
                <td><?php echo $feedback; }?></td>

                <?php }?>
            </tr>
        </table>
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