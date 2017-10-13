
<?php
include ("connect.php");
$eid = $_POST["id"];
$read = "read";

$sql = "UPDATE `contact` SET `viewed` ='$read' WHERE `messageID` = '$eid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

if ($result)
{
    header("Location: message.php?message=success");
}
else
{
    header("Location: message.php?error=fail");

}