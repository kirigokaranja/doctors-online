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
    global $db;

    $free = "FREE";
    $r = mysqli_query($db, "SELECT count(CONSID) FROM medical_details WHERE selected = '$free'");
    while($row1 = mysqli_fetch_assoc($r)){
     $bdge = $row1['count(CONSID)'];


    $s = "SELECT * FROM doctor_details WHERE email = '$id'";

$res = $db->query($s) or trigger_error($db->error."[$s]");
while($row = mysqli_fetch_array($res)) {
    $name = $row['name'];


    ?>
<ul>
    <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 120px;margin-top: 30px;" id="output_image" class='image' ">
    <p style="text-align: center; font-size: 20px; color: white;">Doctor <?php echo $name;}?></p><?php  ?>
    <li><a  href="dashboard.php">Dashboard</a></li>
    <li><a  class="active" href="view_patients.php">View Patients &emsp;<span class="badge" id="spanner"><?php echo $bdge;}?></span></a></li>
    <li><a href="view_feedback.php">Feedbacks</a></li>
    <li><a href="site.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
</ul>
<div class="content">
    <br><br>
    <h1 style="text-align: center">Patients</h1>
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
            <th>SirName</th>
            <th>First Name</th>
            <th>Age</th>
            <th>Weight</th>
            <th>Height</th>
            <th>Select</th>
        </tr>
        <?php

        $free = "FREE";
        $sql = "SELECT * FROM medical_details WHERE `selected` = '$free'";
        global $db;
        $result = $db->query($sql) or trigger_error($db->error."[$sql]");


        while($row = mysqli_fetch_array($result)){

        $sname= $row['surname'];
        $fname = $row['firstname'];
        $age = $row['age'];
        $height = $row['height'];
        $weight =  $row['weight'];
        $diseases = $row['diseases'];
        $all = $row['allergies_choices'];
        $allergies = $row['allergies'];
        $drug = $row['drugs_choices'];
        $drugs = $row['drugs'];
        $consid = $row['CONSID'];


        ?>
        <tr>
            <td><?php echo $sname; ?></td>
            <td><?php echo $fname; ?></td>
            <td><?php echo $age; ?></td>
            <td><?php echo $height; ?></td>
            <td><?php echo $weight; ?></td>
            <td>
                <form action="select.php" method="post">
                    <input type="hidden" name="id" value=" <?php echo $consid; ?>"/>
                    <input type="submit" STYLE="width: 150px;height: 35px;"  value="Select"/>
                </form>
            </td>
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