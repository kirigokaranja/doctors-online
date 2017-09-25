<?php
include ("connect.php");
$surnme = $_POST["lname"];
$firstnme =$_POST["fname"] ;
$email = $_POST["email"] ;
$password = $_POST["password"] ;
$age = $_POST["age"] ;
$gender = $_POST["gender"] ;

$sql = "INSERT INTO `personal_details`(`first_name`, `last_name`, `email`, `gender`, `password`) VALUES('$firstnme','$surnme', '$email', '$gender', '$password')";

$result = $db->query($sql) or trigger_error($db->error."[$sql]");


if ($result)
{

    header("Location: login.php");

}
else
{

    header("Location: signup.php?error=fail");
}