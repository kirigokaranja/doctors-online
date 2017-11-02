<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
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
?>
<script>
    swal({
        title: "Success",
        text: "Doctor Activated successfully!",
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

    header("Location: deactivated_doctors.php?error=fail");
}