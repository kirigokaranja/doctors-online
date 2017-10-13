<?php

include ("connect.php");

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $upass = $_POST['pass'];
    $type = "doctor";
    $act = "active";

    $sql = "SELECT * FROM `users` WHERE `email`='$uname'and `password`='$upass' AND user_type = '$type' AND active = '$act'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");



    if($result && $row = $result->fetch_assoc()){
        if(isset($_POST['remember'])){
            setcookie("uname",$uname, time()+3600,"/","",0);
        }
        session_start();
        $doctID = $row['email'];

       $_SESSION['email'] = $doctID;
        header("Location:dashboard.php");
    }
    else {
        header("Location:login.php?error=wrong");

    }

}
