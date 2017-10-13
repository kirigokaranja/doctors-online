<?php
include ("connect.php");
$surnme = $_POST["lname"];
$firstnme =$_POST["fname"] ;
$email = $_POST["email"] ;
$password = $_POST["password"] ;
$age = $_POST["age"] ;
$gender = $_POST["gender"] ;

$sql1 = "select * from users";
global $db;
$result1 = $db->query($sql1) or trigger_error($db->error."[$sql1]");
while($row = mysqli_fetch_array($result1)) {
    $emails = $row['email'];
    if ($emails == $email) {
        header("Location: signup.php?error=exists");

    } else {
        $sql = "INSERT INTO `personal_details`(`first_name`, `last_name`, `email`, `gender`, `password`) VALUES('$firstnme','$surnme', '$email', '$gender', '$password')";

        $result = $db->query($sql) or trigger_error($db->error . "[$sql]");


        if ($result) {

            header("Location: login.php");

        } else {

            header("Location: signup.php?error=fail");
        }
    }
}