<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/dash.css" type="text/css" rel="stylesheet">
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
    <script src="../js/Chart.min.js"></script>
</head>
<body>
<script>
var dates_n = [];
var dates= [];
</script>
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
        $did = $row['doctID'];


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

                        $r4 = mysqli_query($db, "SELECT count(feedbackID) FROM feedback WHERE doctID = '$did'");
                        while($row4 = mysqli_fetch_assoc($r4)){

                            $s3 = "FREE";

                            $r5 = mysqli_query($db, "SELECT count(CONSID) FROM medical_details WHERE selected = '$s3'");
                            while($row5 = mysqli_fetch_assoc($r5)){

                                $r6 = mysqli_query($db, "SELECT count(feedbackID) FROM feedback WHERE doctID = '$did'");
                                while($row6 = mysqli_fetch_assoc($r6)){
                            ?>
                            <table class="def1">
                                <tr >

                                    <th style=" background-color: deepskyblue;">Number of Feedback </th>
                                    <th>&emsp;</th>
                                    <th colspan="2" style=" background-color: rgb(17, 34, 61);">Number of Consultations</th>
                                </tr>
                                <tr>

                                    <td style=" background-color: deepskyblue;"><?php echo $row4['count(feedbackID)'];?></td>
                                    <td>&emsp;</td>
                                    <td style=" background-color: rgb(17, 34, 61);"><b> Total Pending</b><br><?php echo $row5['count(CONSID)'];?></td>
                                    <td style=" background-color: rgb(17, 34, 61);"><b>Yours Viewed</b><br><?php echo $row6['count(feedbackID)'];?></td>
                                </tr>
                            </table>

                <?php }?>
                    <?php }?>
                <?php }?>

                <?php

                global $db;
                $sql = mysqli_query($db, "SELECT DISTINCT doctID FROM feedback");
                while($row = mysqli_fetch_assoc($sql)){
                    $date = $row["doctID"];


                    $query1 = mysqli_query($db, "select DISTINCT date, count(feedbackID) as 'total' from feedback where doctID='$date'");
                    while($row1 = mysqli_fetch_assoc($query1)) {
                        // $entry = $row1['date'] . ' ' . $row1['total'] . "<br>";
                        $no = $row1['total'];
                        $dt = $row1['date'];

                        ?>
                        <script>
                            dates_n[dates_n.length]="<?php echo $no; ?>";
                            dates[dates.length]="<?php echo $dt; ?>";
                        </script>
                        <?php
                    }
                }
                ?>
                <div style="font-size: 15px;text-align: center;color: rgb(25,25,112);">
                    <br><br><br>
                    <h1 >Your Consults</h1>
                    <div style="height: 50%;width: 50%;margin-left: 10%">
                        <canvas id="myChart" ></canvas>
                    </div>
                </div>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',

                        // The data for our dataset
                        data: {
                            labels: dates,
                            datasets: [{
                                label: "Number of Consults per Day",
                                backgroundColor: 'rgb(30,144,255)',
                                borderColor: 'rgb(30,144,255)',
                                data:dates_n
                            }]
                        },

                        // Configuration options go here
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                xAxes: [{
                                    barPercentage: 0.4,
                                    scaleLabel:{
                                        display: true,
                                        labelString: 'Dates'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    },
                                    scaleLabel:{
                                        display: true,
                                        labelString: 'Number of Consults'
                                    }
                                }]
                            }
                        }
                    });
                </script>
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