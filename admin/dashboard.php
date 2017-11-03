<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/dash.css" type="text/css" rel="stylesheet">
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
    <script src="../js/Chart.min.js"></script>
</head>
<body>
<script>
    var dates_n = [];
    var dates = [];
    var dates1_n1 = [];
    var dates1 = [];
    var dates2_n2 = [];
    var dates2 = [];
</script>
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
    <h1 id="prof">DashBoard<h1><br>
            <?php

            include 'connect.php';
            global $db;
            $r = mysqli_query($db, "SELECT count(custID) FROM personal_details");
            while($row1 = mysqli_fetch_assoc($r)){

            $r3 = mysqli_query($db, "SELECT count(messageID) FROM contact");
            while($row3 = mysqli_fetch_assoc($r3)){

                $r4 = mysqli_query($db, "SELECT count(feedbackID) FROM feedback");
                while($row4 = mysqli_fetch_assoc($r4)){
                ?>
            <table class="def1">
                <tr >
                    <th style=" background-color: rgb(17, 34, 61);">Number of Messages</th>
                    <th>&emsp;</th>
                    <th style=" background-color: deepskyblue;">Number of Feedback</th>
                    <th>&emsp;</th>
                    <th style=" background-color: rgb(17, 34, 61);">Number of Customers</th>
                </tr>
                <tr>
                    <td style=" background-color: rgb(17, 34, 61);"><?php echo $row3['count(messageID)'];?></td>
                    <td>&emsp;</td>
                    <td style=" background-color: deepskyblue;"><?php echo $row4['count(feedbackID)'];?></td>
                    <td>&emsp;</td>
                    <td style=" background-color: rgb(17, 34, 61);"><?php echo $row1['count(custID)'];?></td>
                </tr>
            </table>
            <?php }?>
            <?php }?>
            <?php }?>

            <br><br>
            <?php
                $s1 = "active";
                $s2 = "deactive";
            $s3 = "FREE";
            $s4 = "seen";

            $r = mysqli_query($db, "SELECT count(doctID) FROM doctor_details WHERE active = '$s1'");
            while($row1 = mysqli_fetch_assoc($r)){

                $r2 = mysqli_query($db, "SELECT count(doctID) FROM doctor_details WHERE active = '$s2'");
                while($row11 = mysqli_fetch_assoc($r2)){

            $r5 = mysqli_query($db, "SELECT count(CONSID) FROM medical_details WHERE selected = '$s3'");
            while($row5 = mysqli_fetch_assoc($r5)){


                $r6 = mysqli_query($db, "SELECT count(CONSID) FROM medical_details WHERE selected = '$s4'");
                while($row6 = mysqli_fetch_assoc($r6)){
                ?>
                <table class="def1">
                    <tr>
                        <th colspan="2" style=" background-color: rgb(17, 34, 61);">Number of Doctors</th>
                        <th>&emsp;</th>
                        <th colspan="2" style=" background-color: deepskyblue;">Number of Consultations</th>
                    </tr>
                    <tr>
                        <td style=" background-color: rgb(17, 34, 61);"><b>Activated</b><br><?php echo $row1['count(doctID)'];?></td>
                        <td style=" background-color: rgb(17, 34, 61);"><b>Deactivated</b><br><?php echo $row11['count(doctID)'];?></td>
                        <td>&emsp;</td>
                        <td style=" background-color: deepskyblue;"><b>Pending</b><br><?php echo $row5['count(CONSID)'];?></td>
                        <td style=" background-color: deepskyblue;"><b>Viewed</b><br><?php echo $row6['count(CONSID)'];?></td>
                    </tr>
                </table>
                <?php }?>
                <?php }?>
            <?php }?>
            <?php }?>
            <?php

            global $db;
            $sql1 = mysqli_query($db, "SELECT DISTINCT date FROM feedback");
            while($row2 = mysqli_fetch_assoc($sql1)){
                $date = $row2["date"];


                $query2 = mysqli_query($db, "select DISTINCT date, count(feedbackID) as 'total' from feedback where date='$date'");
                while($row1 = mysqli_fetch_assoc($query2)) {
                    $no = $row1['total'];
                    $dt = $row1['date'];

                    ?>
                    <script>

                        dates1_n1[dates1_n1.length] = "<?php echo $no; ?>";
                        dates1[dates1.length] = "<?php echo $dt; ?>";
                    </script>
                    <?php

                }
            }
            ?>
            <?php

            global $db;
            $sql = mysqli_query($db, "SELECT DISTINCT date FROM contact");
            while($row = mysqli_fetch_assoc($sql)){
                $date = $row["date"];


                $query1 = mysqli_query($db, "select DISTINCT date, count(messageID) as 'total' from contact where date='$date'");
                while($row1 = mysqli_fetch_assoc($query1)) {
                    $entry = $row1['date'] . ' ' . $row1['total'] . "<br>";
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

            <?php

            global $db;
            $sql2 = mysqli_query($db, "SELECT DISTINCT doctID FROM feedback");
            while($row3 = mysqli_fetch_assoc($sql2)){
                $did = $row3["doctID"];
                // echo $did."<br>";

                $query2 = mysqli_query($db, "select DISTINCT doctID, count(feedbackID) as 'total' from feedback where doctID='$did'");
                while($row1 = mysqli_fetch_assoc($query2)) {

                    $no = $row1['total'];
                    $dt = $row1['doctID'];


                    $sq = mysqli_query($db, "SELECT DISTINCT name FROM doctor_details WHERE doctID = '$dt'");
                    while ($rw1 = mysqli_fetch_assoc($sq)) {
                        $dname = $rw1['name'];



                        ?>
                        <script>

                            dates2_n2[dates2_n2.length] = "<?php echo $no; ?>";
                            dates2[dates2.length] = "<?php echo $dname; ?>";
                        </script>
                        <?php
                    }
                }
            }
            ?>


            <div style="font-size: 15px;text-align: center;color: rgb(25,25,112);">
                <br>
                <h1 >Consults per Doctor</h1>
                <div style="height: 50%;width: 50%;margin-left: 10%">
                <canvas id="myChart2" ></canvas>
                </div>

                <br><h1 >Feedback per day</h1>
                <div style="height: 50%;width: 50%;margin-left: 10%">
                <canvas id="myChart"></canvas>
                </div>

                <br><h1 >Messages per day</h1>
                <div style="height: 50%;width: 50%;margin-left: 10%">
                <canvas id="myChart1"></canvas>
                        </div>
            </div>
            <script>
                var ctx = document.getElementById('myChart1').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: dates,
                        datasets: [{
                            label: "Number of Messages per Day",
                            backgroundColor: 'rgb(0,191,255)',
                            borderColor: 'rgb(0,191,255)',
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
                                    labelString: 'Days of the week'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                },
                                scaleLabel:{
                                    display: true,
                                    labelString: 'Number of times'
                                }
                            }]
                        }
                    }
                });
            </script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: dates1,
                        datasets: [{
                            label: "Number of Feedbacks per Day",
                            backgroundColor: 'rgb(75,0,130)',
                            borderColor: 'rgb(75,0,130)',
                            data:dates1_n1
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
                                    labelString: 'Days of the week'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                },
                                scaleLabel:{
                                    display: true,
                                    labelString: 'Number of times'
                                }
                            }]
                        }
                    }
                });
            </script>
            <script>
                var ctx = document.getElementById('myChart2').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: dates2,
                        datasets: [{
                            label: "Number of Consults per Doctor",
                            backgroundColor: 'rgb(30,144,255)',
                            borderColor: 'rgb(30,144,255)',
                            data:dates2_n2
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
                                    labelString: 'Doctors'
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
    <div style="margin-top: 15%; border: 1px solid lightblue; width: 50%; margin-left: 25%">
        <br><br>
        <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
        <p style="text-align: center"><a href="login.php" style="color: red; font-size: 30px; "> Login</a></p>
    </div>
<?php } ?>
</body>
</html>