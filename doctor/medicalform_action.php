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



$sql = "INSERT INTO `medical_details`( `Symptoms`, `surname`, `firstname`, `age`, `height`, `weight`, `diseases`, `allergies_choices`, `allergies`, `drugs_choices`, `drugs`) VALUES ( '$symptoms', '$surname', '$firstname', '$age', '$height','$weight', '$diseases', '$all', '$all2', '$medication', '$medication2')";


$result = $db->query($sql) or trigger_error($db->error."[$sql]");


if ($result)
{

  header("Location: medicalform.php?message=success");

}
else
{

    header("Location: medicalform.php?error=fail");
}
