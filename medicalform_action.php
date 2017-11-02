<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");

$surname = $_POST["surname"];
$firstname = $_POST["firstname"];
$age = $_POST["age"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$symptoms = $_POST["symptoms"];
$diseases = implode(',', $_POST["diseases"]);
$all= $_POST["allergies"];
$all2= $_POST["medallergies"];
$medication = $_POST["medication"];
$medication2 = $_POST["medications"];
$id = $_POST["id"];



$sql = "INSERT INTO `medical_details`( `Symptoms`, `surname`, `firstname`, `age`, `height`, `weight`, `diseases`, `allergies_choices`, `allergies`, `drugs_choices`, `drugs`, `custID`) VALUES ( '$symptoms', '$surname', '$firstname', '$age', '$height','$weight', '$diseases', '$all', '$all2', '$medication', '$medication2', '$id')";

global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");


if ($result)
{
    ?>

<script>
    swal({
        title: "Success",
        text: "Consultation sent successfully!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "medicalform.php"
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
        location.href = "medicalform.php"
    }, 1000);
</script>
<?php
}
?>