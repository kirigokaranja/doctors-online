<html>
<head>
    <title> Admin | Profile</title>
    <link href="admin/css/new.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/dropdown.css">
    <style>
        body{
            background-image: url("image/ste.jpg");
            background-repeat: no-repeat;
            margin:0;
            font-family: 'Montserrat', sans-serif;
        }
        /** form starts **/

        fieldset{
            border-radius: 8px;
            width: 90%;
            margin-left: 5%;
            background-color: whitesmoke;
            opacity: 0.9;
        }
        button{
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 25%;
        }
        button:hover{
            opacity: 0.3;
        }
        input[type=text],input[type=email] , textarea{
            width: 30%;
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

    <div class="content">
        <?php
        $feedid = $_POST["feedid"];
        $doc = $_POST["doc"];
        $sql = "SELECT * FROM feedback WHERE feedbackID = '$feedid'";
        global $db;
        $result = $db->query($sql) or trigger_error($db->error."[$sql]");

        while($row = mysqli_fetch_array($result)){

        $date = $row['date'];
        $symp = $row['symptoms'];
        $feed = $row['feedback'];

        ?>

            <img src="image/logo.jpg" height="120" style="float: left;margin-left: 2%;">
                <form>
                    <fieldset class="new">
                        <br>
                        <label>Feedaback Date:</label>
                        <input type="text" name="name" value="<?php  echo $date;?>"><br><br>
                        <label>Symptoms:</label>
                        <input type="email" name="email" value="<?php  echo $symp;?>"><br><br>
                        <label>feedback:</label>
                        <input type="text" name="feedback" value="<?php  echo $feed;?>"><br><br>
                        <label>Doctor's Name</label>
                        <input type="text" name="docname" value="<?php  echo $doc;}?>"><br><br>
                        <button style="width: 150px;">Back</button>
                    </fieldset>

                </form>
    </div>
        </div>
    </div>
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