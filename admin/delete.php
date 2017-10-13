<?php
include ("connect.php");
$id = $_POST["id"];
$email = $_POST["email"];
$de = "deactive";

$sql = "UPDATE `doctor_details` SET active = '$de' WHERE doctID = '$id'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

$s = "UPDATE users SET active = '$de' WHERE email = '$email'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");

if ($result && $res)
{

    header("Location: view_doctor.php?message=success");

}
else
{

    header("Location: view_doctor.php?error=fail");
}