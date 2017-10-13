<?php
include ("connect.php");
$id = $_POST["id"];

$sql = "SELECT * FROM medical_details WHERE `CONSID` = '$id'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");


while($row = mysqli_fetch_array($result)) {

    $sname = $row['surname'];
    $fname = $row['firstname'];
    $age = $row['age'];
    $height = $row['height'];
    $weight = $row['weight'];
    $diseases = $row['diseases'];
    $all = $row['allergies_choices'];
    $allergies = $row['allergies'];
    $drug = $row['drugs_choices'];
    $drugs = $row['drugs'];
    $consid = $row['CONSID'];
    $symptoms = $row['Symptoms'];
    $custid = $row['custID'];

?>

<html>
<head>
    <link href="css/doctor.css" type="text/css" rel="stylesheet">
</head>
<body>
    <?php

    session_start();
    include ("connect.php");

    if(isset($_SESSION['email'])){
        $docid = $_SESSION['email'];

        $s = "SELECT * FROM doctor_details WHERE email = '$docid'";
        global $db;
        $res = $db->query($s) or trigger_error($db->error."[$s]");
        ?>
<button class="back" onclick="window.location.href='view_patients.php'" >Back</button>
<form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <label class="label"> Name</label>
        &emsp;&emsp;<input type="text" value="<?php echo $sname?>" readonly> <input type="text" value="<?php echo $fname?>" readonly><br>
        <label class="label"> Age</label>
        &emsp;&emsp;&ensp;<input type="text" value="<?php echo $age?>" readonly>
    &emsp;&emsp;<label class="label"> Height(cm)</label>
        &emsp;<input type="text" value="<?php echo $height?>" readonly>
    &emsp;&emsp;&ensp;<label class="label"> Weight(kg)</label>
        &emsp;<input type="text" value="<?php echo $weight?>" readonly><br>
        <label class="label"> Conditions that apply to members of immediate relatives</label>
        <br> &emsp;&emsp;&emsp;&emsp;
        <input  type="text" style="height: 100px; width: 365px" value="<?php echo $diseases?>" readonly><br>
        <label class="label"> Medical allergies</label>
        <br>&emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" value="<?php echo $allergies?>" readonly><br>
        <label class="label"> Medications taken currently</label>
        <br> &emsp;&emsp;&emsp;&emsp;<input  type="text" style="height: 100px" value="<?php echo $drugs?>" readonly><br>
    <label class="label">Symptoms :</label>
    &emsp;<input  type="text" style="height: 100px; width: 365px;" value="<?php echo $symptoms?>" readonly><br>

    </fieldset>
</form>
<form action="feedback.php" method="post">
    <fieldset style="background-color: lightblue">
        <label>Feedback:</label>
        <input type="hidden" name="custid" value="<?php echo $custid;?>">
        <input type="hidden" name="doctid" value="<?php echo $docid;?>">
        <input type="hidden" name="consid" value="<?php echo $consid;?>">
        <input type="hidden" name="symp" value="<?php echo $symptoms;?>">
        <input type="text" name="feedback" style="height: 100px; width: 50%"><br><br>
        <button type="submit" style="background-color: blue;color: white;padding: 12px 20px;border: none;border-radius: 6px;cursor: pointer;margin-left: 10%">Submit Feedback</button>
    </fieldset>
</form>
        <?php
    }else{

        session_destroy();


        ?>
        <br><br>
        <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
        <p style="text-align: center"><a href="login.php" style="color: red; font-size: 30px; "> Login</a></p>
    <?php } ?>
</body>
</html>
<?php }?>