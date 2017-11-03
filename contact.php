<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$date = date("Y/m/d");

$sql = " INSERT INTO `contact`(`name`, `email`, `message`, date) VALUES('$name','$email','$message', '$date')";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");


if ($result){
    ?>

    <script>
        swal({
            title: "Success",
            text: "Message sent successfully!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
        setTimeout(function () {
            location.href = "index.php"
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
        location.href = "index.php"
    }, 1000);
</script>
<?php
}
?>