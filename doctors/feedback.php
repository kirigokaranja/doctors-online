<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
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
        ?>
        <script>
            swal({
                title: "Success",
                text: "Feedback sent successfully!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "view_patients.php"
            }, 1000);
        </script>
<?php
    } else {
        header("Location: view_patients.php?error=fail");
    }
}

