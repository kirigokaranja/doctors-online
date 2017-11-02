<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
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
    ?>

<script>
    swal({
        title: "Success",
        text: "Doctor Added successfully!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "view_doctor.php"
    }, 1000);
</script>
<?php
}
else
{

   header("Location: add_doctor.php?error=fail");
}
