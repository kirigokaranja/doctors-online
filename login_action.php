<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php

include ("connect.php");

if(isset($_POST['submit'])){
    $uname = $_POST['UserName'];
    $upass = $_POST['password'];

    $sql = "SELECT * FROM `personal_details` WHERE `email`='$uname'and `password`='$upass'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");
    if($result && $row = $result->fetch_assoc()){

        session_start();
        $custID = $row['custID'];

        $_SESSION['custID'] = $custID;
?>

<script>
    swal({
        title: "Success",
        text: "Login successful!",
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
    else {
        header("Location:login.php?error=wrong");

    }

}
