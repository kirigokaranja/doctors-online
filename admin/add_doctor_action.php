<?php
include ("connect.php");

$name = $_POST["name"];
$email = $_POST["email"];
$phne = $_POST["phone"];
$gender = $_POST["gender"];
$password = $_POST["password"];
$type = "doctor";


$sql = "INSERT INTO `doctor_details`(`name`, `email`, `phone_number`, `gender`) VALUES ('$name','$email','$phne','$gender')";
$sq = "INSERT INTO `users`(`user_type`, `email`, `password`) VALUES ('$type', '$email','$password')";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");
$rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

if ($result && $rslt)
{

    header("Location: add_doctor.php?message=success");

}
else
{

   header("Location: add_doctor.php?error=fail");
}
