<?php
include ("connect.php");
$id = $_POST["id"];
$email = $_POST["email"];
$de = "active";

$sql = "UPDATE `doctor_details` SET active = '$de' WHERE doctID = '$id'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

$s = "UPDATE users SET active = '$de' WHERE email = '$email'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");

if ($result && $res)
{

    header("Location: view_doctor.php?message=active");

}
else
{

    header("Location: deactivated_doctors.php?error=fail");
}