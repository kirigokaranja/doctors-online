<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");
$surnme = $_POST["lname"];
$firstnme =$_POST["fname"] ;
$email = $_POST["email"] ;
$password = $_POST["password"] ;
$gender = $_POST["gender"] ;

        $sql = "INSERT INTO `personal_details`(`first_name`, `last_name`, `email`, `gender`, `password`) VALUES('$firstnme','$surnme', '$email', '$gender', '$password')";
        global $db;
        $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

        if ($result) {
            ?>

            <script>
            swal({
            title: "Success",
            text: "Signup successful!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "login.php"
            }, 1000);
             </script>

<?php
        } else {

            header("Location: signup.php?error=fail");
        }

