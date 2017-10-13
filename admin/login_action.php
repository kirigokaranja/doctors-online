<?php

include ("connect.php");

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $upass = $_POST['pass'];
    $type = "admin";

    $sql = "SELECT * FROM `users` WHERE `email`='$uname'and `password`='$upass' AND user_type = '$type'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");
    if($result && $row = $result->fetch_assoc()){
        if(isset($_POST['remember'])){
            setcookie("uname",$uname, time()+3600,"/","",0);
        }
        session_start();
        $adminID = $row['user_type'];

        $_SESSION['user_type'] = $adminID;
        header("Location:dashboard.php");
    }
    else {
        header("Location:login.php?error=wrong");

    }

}
