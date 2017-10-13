<?php
include ("connect.php");
$feedback = $_POST["feedback"];
$custid = $_POST["custid"];
$docid = $_POST["doctid"];
$consid =$_POST["consid"];
$sym = $_POST["symp"];
$date = date("Y-m-d");

$sq = "SELECT * FROM doctor_details WHERE `email` = '$docid'";
global $db;
$res = $db->query($sq) or trigger_error($db->error."[$sq]");


while($row = mysqli_fetch_array($res)) {
    $doctID = $row['doctID'];


    $sql = "INSERT INTO `feedback`( `custID`, `doctID`, `feedback`, symptoms, date) VALUES ('$custid', '$doctID', '$feedback', '$sym', '$date')";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    $sql1 = "UPDATE `medical_details` SET `selected`='seen' WHERE CONSID = '$consid'";
    global $db;
    $result1 = $db->query($sql1) or trigger_error($db->error . "[$sql1]");
    if ($result && $result1) {
        header("Location: view_patients.php?message=success");
    } else {
        header("Location: view_patients.php?error=fail");
    }
}

