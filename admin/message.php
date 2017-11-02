<html>
<head>
    <title> Admin | Profile</title>
    <link href="css/new.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/dropdown.css">
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
    <img src='../image/doctor.png' width=100px; height=100px; style="border-radius: 50%;margin-left: 80px;margin-top: 30px;" id="output_image" class='image' ">
    <p style="text-align: center; font-size: 20px; color: white;">Administrator</p>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="add_doctor.php">Add Doctor</a></li>
    <div class="dropdown">
        <li><a  href="view_doctor.php">View Doctors</a></li>
        <div class="dropdown-content">
            <a href="">Inactive Doctors</a>
        </div>
    </div>
    <li><a class="active" href="message.php"> Messages</a></li>
    <li><a href="../index.php"> Go to site</a></li>
    <li> <br><button onclick="window.location.href='logout.php'" class="logout">Logout</button></li>
</ul>
<div class="content">
    <img src="../image/logo.jpg" height="120" style="float: left;margin-left: 10%;"><br>
    <h1 id="prof">Messages<h1>
            <br><br>
            <?php
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            // error message incase username or password are incorrect

            if(strpos($url,'error=fail')){
                echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
            }elseif(strpos($url,'message=success')){
                echo "<p style='color:red; font-size:30px;text-align: center;'>Message Read </p>";
            }
            ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>View</th>
                </tr>
                <?php
                include ("connect.php");
                $view = "unread";
                $sql = "SELECT * FROM contact WHERE viewed = '$view'";
                global $db;
                $result = $db->query($sql) or trigger_error($db->error."[$sql]");


                while($row = mysqli_fetch_array($result)){

                $message = $row['message'];
                $name = $row['name'];
                $email = $row['email'];
                $id = $row['messageID'];


                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $message; ?></td>
                    <td>

                        <form action="read_message.php" method="post">
                            <input type="hidden" name="messageid" value=" <?php echo $id; ?>">
                            <button type="submit" STYLE="width: 150px;font-size: 20px;margin-top: 2%"> View </button>
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