<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
    <style>
        button:hover{
            background-color: blue;
            color: white;
            border: 1px solid blue;
        }
    </style>

</head>
<body>
<?php

session_start();
include ("connect.php");


if(isset($_SESSION['user_type'])){ ?>
<ul>
    <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 120px;margin-top: 30px;" id="output_image" class='image' >
    <p style="text-align: center; font-size: 20px; color: white;">Administrator</p>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="add_doctor.php">Add Doctor</a></li>
    <li><a class="active" href="view_doctor.php">View Doctors</a></li>
    <li><a href="message.php"> Messages</a></li>
    <li><a href="../index.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
</ul>
<div class="content">
    <br>
    <h1 id="prof">View Doctors<h1>


            <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            // error message incase username or password are incorrect

            if(strpos($url,'error=fail')){
                echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
            }elseif(strpos($url,'message=success')){
                echo "<p style='color:red; font-size:30px;text-align: center;'>Doctor Successfully Activated </p>";
            }
            ?>
            <button STYLE="width: 150px;font-size: 25px; float: right;" onclick="window.location.href='view_doctor.php'">Activated Doctors</button>
            <br><br>
            <table>
                <tr>
                    <th>Doctor's No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Activate</th>
                </tr>
                <?php
                $active = "deactive";
                $sql = "SELECT * FROM doctor_details WHERE active = '$active' ORDER BY doctID ";
                global $db;
                $result = $db->query($sql) or trigger_error($db->error."[$sql]");


                while($row = mysqli_fetch_array($result)){

                $id = $row['doctID'];
                $name = $row['name'];
                $email = $row['email'];
                $phne = $row['phone_number'];
                $gender =  $row['gender'];

                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phne; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td>

                        <form action="activate.php" method="post">
                            <input type="hidden" name="id" value=" <?php echo $id; ?>">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                            <button type="submit" STYLE="width: 150px;font-size: 25px;margin-top: 2%"> Activate </button>
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
    <div style="margin-top: 15%; border: 1px solid lightblue; width: 50%; margin-left: 25%">
        <br><br>
        <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
        <p style="text-align: center"><a href="login.php" style="color: red; font-size: 30px; "> Login</a></p>
    </div>
<?php } ?>
</body>
</html>