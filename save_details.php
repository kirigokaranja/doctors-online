<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
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
    ?>

    <script>
        swal({
            title: "Success",
            text: "Details saved successfully!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
        setTimeout(function () {
            location.href = "personal_details.php"
        }, 1000);
    </script>
    <?php
}
else
{
?>

<script>
    swal({
        title: "Error!",
        text: "An error ocurred",
        type: "error",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "personal_details.php"
    }, 1000);
</script>
<?php
}
?>