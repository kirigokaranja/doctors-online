<html>
<head>
    <style>
        body{
            background-image: url("image/ste.jpg");
            background-repeat: no-repeat;
            margin:0;
            font-family: 'Montserrat', sans-serif;
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

        /** form starts **/
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
            margin-left: 39%;
        }
        input[type=submit]:hover{
            opacity: 0.3;
        }
        input[type=text],input[type=email] , textarea{
            width: 40%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top:  6px;
            margin-bottom: 16px;
            resize: vertical;
            border-radius: 6px;
        }
        /** form ends **/

        /** dropdown starts**/
        .dropdown {
            float: right;
            overflow: hidden;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 1%;
            margin-top: 5%;
        }
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
        /** dropdown ends**/
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
    <div class="dropdown">
        <a style="margin-top: 15px;"><img class="dropbtn" onclick="myFunction()" src="image/manuser.png" height="30"></a>
        <div class="dropdown-content" id="myDropdown">
            <a href="personal_details.php">Personal Details</a>
            <a href="feedback.php">Feedback</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <a  style="margin-top: 15px; " href="index.php">Home</a>
    <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a> <!-- navbar icon-->
</div>
<!-- navbar ends-->
<!-- medical form section starts -->
<div class="medform"><br>
    <h2 style="text-align: center;" > Medical Consultation Form.</h2>
    <?php
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    // error message incase username or password are incorrect

    if(strpos($url,'error=fail')){
        echo "<p style='color:red; font-size:20px;text-align: center;'>Consultation form not sent</p>";
    }elseif(strpos($url,'message=success')){
        echo "<p style='color:red; font-size:30px;text-align: center'>Consultation form sent successfully </p>";
    }
    ?>
    <div class="form">
        <form action="medicalform_action.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <?php
                $id = $_SESSION['custID'];
                $sql = "SELECT * FROM personal_details WHERE custID = '$id'";
                global $db;
                $result = $db->query($sql) or trigger_error($db->error."[$sql]");

                while($row = mysqli_fetch_array($result)){

                $nme = $row['first_name'];
                $name = $row['last_name'];

                ?>
                <label class="label"> Name</label>
                &emsp;&emsp;&emsp;&ensp;<input type="text"  name="surname" value="<?php echo $nme;?>" readonly> <input type="text"  name="firstname" value="<?php echo $name;?>" readonly><br>
                <?php } ?>
                <label class="label"> Age</label>
                &emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" id="" name="age"><br>
                <label class="label"> Height(cm)</label>
                &emsp;<input type="text" id="" name="height"><br>
                <label class="label"> Weight(kg)</label>
                &emsp;<input type="text" id="" name="weight"><br>
                <label class="label"> Explain the symptoms that you are currently experiencing:</label>
                <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<textarea  name="symptoms" style="height: 150px"></textarea><br>
                <label class="label"> Check the conditions that apply to you or any member of your immediate relatives</label>
                <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="checkbox" name="diseases[]" value="Asthma">Asthma
                <input type="checkbox" name="diseases[]" value="Cancer">Cancer
                <input type="checkbox" name="diseases[]" value="Cardiac Diseases">Cardiac Diseases
                <input type="checkbox" name="diseases[]" value="Diabetes">Diabetes
                <input type="checkbox" name="diseases[]" value="Hypertension">Hypertension
                <input type="checkbox" name="diseases[]" value="Epilepsy">Epilepsy<br>
                <label class="label"> Do you have any medical allergies?</label>
                <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="allergies" value="yes">Yes
                <input type="radio" name="allergies" value="no">No<br>
                <label class="label"> If yes, list them below</label>
                <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<textarea  name="medallergies" style="height: 150px"></textarea><br>
                <label class="label"> Taking any medications, currently?</label>
                <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="radio" name="medication" value="yes">Yes
                <input type="radio" name="medication" value="no">No<br>
                <label class="label">If yes, list them here</label>
                <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<textarea name="medications" style="height: 150px"></textarea><br>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" value="Submit Form" >
            </fieldset>
        </form>
    </div>
</div>

<!-- medical form section starts -->

<script>
    /* When the user clicks on the button,
     toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>
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