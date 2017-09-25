<?php
include ("connect.php");
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = " INSERT INTO `contact`(`name`, `email`, `message`) VALUES('$name','$email','$message')";
$result = $db->query($sql) or trigger_error($db->error."[$sql]");


if ($result)
{

    header("Location: index.php?message=success");

}
else
{

    header("Location: index.php?error=fail");
}