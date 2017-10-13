<html>
<head>
    <style>
        body{

            background: url("image/stath.jpg");
            background-repeat: no-repeat;
        }
        /**navbar starts-- **/
        .topnav {
            overflow: hidden;
            background-color: white;
            height: 100px;
            border-bottom: 1px solid blue;
        }

        .topnav a {
            float: right;
            display: block;
            color: blue;
            text-align: center;
            padding: 24px 16px;
            text-decoration: none;
            font-size: 20px;

        }

        .topnav a:hover {
            font-size: 24px;
            bottom: 3px;
            border-bottom: solid blue;
        }

        .topnav .icon {
            display: none;
        }
        /**navbar endss-- **/
        .label{
            font-size: 18px;
        }
        fieldset{
            border-radius: 8px;
            width: 60%;
            margin-left: 25%;
            background-color: whitesmoke;
            opacity: 0.9;
        }
        input[type=submit]{
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 35%;

        }
        input[type=submit]:hover{
            opacity: 0.3;
        }
        input[type=text],input[type=email] , input[type=date]{
            width: 25%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top:  6px;
            margin-bottom: 16px;
            resize: vertical;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<?php

session_start();
include ("connect.php");


if(isset($_SESSION['custID'])){ ?>
<!-- navbar starts-->
<div class="topnav" id="myTopnav">
    <a style="float: left; padding: 0px 16px; margin-left: 30px;" href="index.php"><img src="image/logo.jpg" height="140"></a>
    <a  style="margin-top: 15px; " href="logout.php">logout</a>
    <a  style="margin-top: 15px; " href="medicalform.php">Consult a Doctor</a>
    <a  style="margin-top: 15px;" href="feedback.php">Feedback </a>
    <a  style="margin-top: 15px; " href="index.php">Home</a>
    <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a> <!-- navbar icon-->
</div>
<!-- navbar ends-->
<!-- medical form section starts -->
<div class="medform"><br>
    <h2 style="text-align: center;" > Personal Details Form.</h2>
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        // error message incase username or password are incorrect

        if(strpos($url,'error=fail')){
            echo "<p style='color:red; font-size:20px;text-align: center;'>Deatils not saved</p>";
        }elseif(strpos($url,'message=success')){
            echo "<p style='color:red; font-size:30px;text-align: center'>Details successfully saved </p>";
        }
        ?>
    <div class="form">
        <?php
        $id = $_SESSION['custID'];
        $sql = "SELECT * FROM personal_details WHERE custID = '$id'";
        global $db;
        $result = $db->query($sql) or trigger_error($db->error."[$sql]");

        while($row = mysqli_fetch_array($result)){

        $nme = $row['first_name'];
        $name = $row['last_name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $phonecode = $row['phnecode'];
        $phneno = $row['phoneno'];
        $address = $row['address'];
        $emsur = $row['em_surname'];
        $emfi = $row['em_firstname'];
        $relatinship = $row['relationship'];
        $emphnecode = $row['em_phonecode'];
        $emphoneno = $row['em_phoneno'];

        ?>
        <form action="save_details.php" method="post">
            <fieldset>
                <label class="label"> Name</label>
                &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<input type="text"  name="surname" value="<?php echo$name;?>" readonly> <input type="text"  name="firstname" value="<?php echo $nme;?>" readonly><br>
                <label class="label"> Email</label>
                &emsp;&emsp;&emsp;&emsp;&emsp;<input type="email" id="" name="email" value="<?php echo $email;?>" readonly><br>
                <label class="label"> Phone Number</label>
                &emsp;<input type="text" id="code" name="code" style="width: 17%" value="<?php echo $phonecode;?>">--<input type="text" name="number" value="<?php echo $phneno;?>"><br>
                <label class="label"> Gender</label>
                &emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" id="" name="gender" value="<?php echo $gender;?>" readonly><br>
                <label> Date of Birth</label>
                &emsp;&emsp;&emsp;<input type="date" name="dob" ><br>
                <label> Address</label>
                &emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" name="address" value="<?php echo $address;?>" >
                <hr>
                <label> Incase of Emergency ...</label><br><br>
                <label> Emergency Contact</label>
                <input type="text"  name="ermsurname" value="<?php echo $emsur;?>"> <input type="text"  name="ermfirstname" value="<?php echo $emfi;?>"><br>
                <label> Relationship</label>
                &emsp;&emsp;&emsp;<input type="text" name="relationship" value="<?php echo $relatinship;?>"><br>
                <label> Contact Number</label>
                &emsp;&ensp;<input type="text" id="code" name="emcode" value="<?php echo $emphnecode;?>" style="width: 13%">--<input type="text" name="emnumber" value="<?php echo $emphoneno;?>"><br>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" value="Submit Form" >
            </fieldset>
            <?php } ?>
        </form>
    </div>
</div>

<!-- medical form section ends -->
    <?php
}else{

    session_destroy();


    ?>
    <div style="margin-top: 15%; border: 1px solid lightblue; width: 50%; margin-left: 25%">
        <br><br>
        <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
        <p style="text-align: center"><a href="login.php" style="color: red; font-size: 30px; "> Login</a></p>
    </div>
<?php } ?>
</body>
</html>