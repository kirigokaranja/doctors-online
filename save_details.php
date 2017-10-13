<?php
include ("connect.php");

$phonecode = $_POST["code"];
$phneno = $_POST["number"];
$address = $_POST["address"];
$emsur = $_POST["ermsurname"];
$emfi = $_POST["ermfirstname"];
$relatinship = $_POST["relationship"];
$emphnecode = $_POST["emcode"];
$emphoneno = $_POST["emnumber"];
$id = $_POST["id"];

$sql = "UPDATE personal_details SET `phnecode` = '$phonecode', `phoneno` = '$phneno', `address` = '$address', `em_surname`= '$emsur', `em_firstname`= '$emfi', `relationship`= '$relatinship', `em_phonecode`= '$emphnecode', `em_phoneno`= '$emphoneno' WHERE custID ='$id'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

if ($result){
    header("Location: personal_details.php?message=success");
}else{
    header("Location: personal_details.php?error=fail");
}