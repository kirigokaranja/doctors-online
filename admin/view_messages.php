<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");
$eid = $_POST["mesid"];
$read = "read";

$sql = "UPDATE `contact` SET `viewed` ='$read' WHERE `messageID` = '$eid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

if ($result)
{
    ?>
<script>
    swal({
        title: "Success",
        text: "Message Read successfully!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "messages.php"
    }, 1000);
</script>
<?php
}
else
{
    header("Location: message.php?error=fail");

}