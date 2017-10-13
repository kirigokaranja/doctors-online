<?php

include ("connect.php");

if(isset($_POST['submit'])){
    $uname = $_POST['UserName'];
    $upass = $_POST['password'];

    $sql = "SELECT * FROM `personal_details` WHERE `email`='$uname'and `password`='$upass'";
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");
    if($result && $row = $result->fetch_assoc()){
        if(isset($_POST['remember'])){
            setcookie("UserName",$uname, time()+3600,"/","",0);
        }
        session_start();
        $custID = $row['custID'];

        $_SESSION['custID'] = $custID;
        header("Location:medicalform.php");
    }
    else {
        header("Location:login.php?error=wrong");

    }

}
