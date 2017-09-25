<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
    <style>
        /**navbar starts-- **/
        body {
            margin:0;
            font-family: 'Montserrat', sans-serif;
        }
        hr{
            background-color: blue;
            height: 1px;
        }
        /**navbar starts-- **/
        .topnav {
            overflow: hidden;
            background-color: white;
            height: 100px;
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
        .table{
            margin-left: 20%;
            padding: 20px;
            border-spacing: 50px;
        }
        .button{
            background-color: white;
            color: blue;
            padding: 15px 32px;
            text-decoration: none;
            border: 2px solid blue;
            text-align: center;
            display: inline-block;
            font-size: 16px;
        }
        .button:hover{
            background-color: blue;
            color: white;
            border: 2px solid white;
        }


        .works1{
            font-weight: 500;
            font-size: 30px;
            line-height: 1.4em;
            text-align: center;
        }
        .works2{
            font-weight: 300;
            font-size: 25px;
            line-height: 1.4em;
            text-align: center;
        }
        .works3{
            font-weight: 300;
            font-size: 17px;
        }
        .works4{
            font-weight: 300;
            font-size: 14px;
        }
        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        .tiles {
            float: left;
            width: 20%;
            margin-bottom: 16px;
            padding: 0 8px;
            margin-left: 30px;
        }

        @media (max-width: 650px) {
            .tiles {
                width: 100%;
                display: block;
            }
        }

        .card {
            padding-top: 20px;
            padding-left: 15px;

        }
        .card:hover{
            background-color: blue;
            color: white;
        }
        .info {
            padding: 0 16px;
            text-align: center;
        }
        .info::after, .row::after {
            content: "";
            clear: both;
            display: table;
        }
        .content{
            border-radius: 5px;
            padding: 20px;
            margin-left: 35%;
            background-color: ghostwhite;
            opacity: 0.9;
        }
        input[type=submit]{
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        input[type=submit]:hover{
            opacity: 0.3;
        }
        input[type=text],input[type=email] , textarea{
            width: 50%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top:  6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        label{
            font-size: 14px;
        }
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative; height: 120px;}
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }

        }
        footer{
            background-color: darkslategray;
            position: fixed;
        }
        .sb{
            list-style-type: none;
            text-align: center;
            margin-left: 38%;
        }
        .sb li{
            display: inline-block;
            float: left;
            padding: 12px 12px;
        }
        .sb li:hover{
            opacity: 0.4;
        }
    </style>
</head>
<body>
<!-- navbar starts-->
<div class="topnav" id="myTopnav">
    <a style="float: left; padding: 0px 16px; margin-left: 30px;" href="index.php"><img src="image/logo.jpg" height="140"></a>
    <a  style="margin-top: 15px;" href="login.php">Login <img src="image/manuser.png" height="20"></a>
    <a  style="margin-top: 15px; " href="signup.php">Sign up</a>
    <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a> <!-- navbar icon-->
</div>
<!-- navbar ends-->

<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
    <div class="ws_images"><ul>
            <li><img src="data1/images/doc5.jpg" alt="" title="" id="wows1_0"/></li>
            <li><img src="data1/images/doc3.jpg" alt="" title="" id="wows1_1"/></li>
            <li><img src="data1/images/doc4.jpg" alt="" title="" id="wows1_2"/></li>
            <li><img src="data1/images/doc6.jpg" alt="" title="" id="wows1_3"/></li>
            <li><img src="data1/images/doc7.jpg" alt="" title="" id="wows1_4"/></li>
            <li><img src="data1/images/doc5.jpg" alt="" title="" id="wows1_5"/></li>
            <li><a href="http://wowslider.com"><img src="data1/images/doc4.jpg" alt="bootstrap slider" title="" id="wows1_6"/></a></li>
            <li><img src="data1/images/doc6.jpg" alt="" title="" id="wows1_7"/></li>
        </ul></div>
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
    <?php
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];



    if(strpos($url,'error=fail')){
        echo "<p style='color:red; font-size:20px;text-align: center;'>Message not sent</p>";
    }elseif(strpos($url,'message=success')){
        echo "<p style='color:red; font-size:30px;text-align: center;'>Message sent successfully </p>";
    }
    ?>
    <!-- how it works starts -->
<div id="works" style="text-align: center;">
    <br><br><br><br><br><br>
    <h1 class="works1"> ITS SIMPLE. YOU CAN SEE A DOCTOR AS SOON AS POSSIBLE.</h1>
    <h2 class="works2"> On your iPhone, iPad, Android or PC.</h2>
    <table class="table">
        <tr>
            <td><img src="image/form1.png" ><h2 class="works3"> 1.Fill in Form Details</h2><p class="works4"> Sign up, Login and give us your details.</p></td>
            <td><img src="image/doctor.png" ><h2 class="works3"> 2. See a Doctor</h2><p class="works4"> Let a doctor view your symptoms and give feedback.</p></td>
            <td><img src="image/pill.png" ><h2 class="works3"> 3. Start Feeling Better</h2><p class="works4"> Get medical advice, prescriptions,referrals and fit notes.</p></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="button" onclick="window.location.href='medicalform.php'"> Consult a Doctor!</button></td>
        </tr>
    </table>
<hr style="background-color: blue">
</div>
    <!-- how it works ends -->

    <!-- doctor information starts-->
    <div id="doctor" style="text-align: center; ">
        <h1 class="works1"> MEET THE DOCTORS.</h1>
        <h2 class="works2"> There's always a doctor ready to talk to you about your health issues, with little to no wait time.</h2><br><br>
        <div class="row">
            <div class="tiles">
                <div class="card">
                    <img class="img" src="image/doc4.png" alt="Jane" style=" border-radius: 50%" height="200" width="200"><!-- displays the image of the doctor-->
                    <div class="info"><!-- information about the doctor -->
                        <h2 class="works2">Michael Gray, MD</h2>
                        <p class="works3">Family Physician</p>
                        <p class="works4">I have been practicing for 9 years and studied at University of Maryland. I am board certified in family medicine.</p>
                        <p class="works4"> Speaks English</p>
                        <p class="works4">emichaelgray@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="tiles">
                <div class="card">
                    <img class="img" src="image/doc1.png" alt="Jane" style=" border-radius: 50%" height="200" width="200"><!-- displays the image of the doctor-->
                    <div class="info"><!-- information about the doctor -->
                        <h2 class="works2">Teresa Myers, MD</h2>
                        <p class="works3">General Physician</p>
                        <p class="works4">I have been practicing for 11 years and studied at St Mathews university school of medicine . I am board certified in general medicine.</p>
                        <p class="works4"> Speaks English</p>
                        <p class="works4">teresa.myr@yahoo.com</p>
                    </div>
                </div>
            </div>
            <div class="tiles">
                <div class="card">
                    <img class="img" src="image/doc3.jpg" alt="Jane" style=" border-radius: 50%" height="200" width="200"><!-- displays the image of the doctor-->
                    <div class="info"><!-- information about the doctor -->
                        <h2 class="works2">Matt Grand, MD</h2>
                        <p class="works3">Emergency Medicine Physician</p>
                        <p class="works4">I have been practicing for 10 years and studied at Southern Illinois university . I am board certified in emergency medicine.</p>
                        <p class="works4"> Speaks English</p>
                        <p class="works4">mattg45@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="tiles">
                <div class="card">
                    <img class="img" src="image/doc6.png" alt="Jane" style=" border-radius: 50%" height="200" width="200"><!-- displays the image of the doctor-->
                    <div class="info"><!-- information about the doctor -->
                        <h2 class="works2">Laura Yarden, MD</h2>
                        <p class="works3">Family Physician</p>
                        <p class="works4">I have been practicing for 20 years and studied at George Washington university . I am board-certified in family medicine.</p>
                        <p class="works4"> Speaks English and Spanish</p>
                        <p class="works4">lauyarden@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- doctor information ends-->
    <hr style="background-color: blue">

    <!-- contact section starts -->
    <div class="contact" id="contact" style="background-color: ghostwhite">
            <h1 class="works1"> CONTACT US.</h1>
            <h2 class="works2"> If you have any inquiries send us a message.</h2>
        <div class="content">

            <form method="post" action="contact.php">
                <label> Name:</label><br>
                <input type="text" id="name" name="name"><br>
                <label> Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <label> Message:</label><br>
                <textarea id="message" name="message" style="height: 150px"></textarea>
                <br><br>
                <input type="submit" value="Send Message" >
            </form>
        </div>
    </div>
    <!-- contact section starts -->


    <!--footer starts-->
    <footer style="background: black; width:100%; border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; position: absolute; left: 0;">
        <div class="footer-logo">
            <div class="social">
                <ul class="sb">

                    <li class="facebook">
                        <a href="https://www.facebook.com/sharon.kirigo.1" >
                            <img src="image/facebook.png">
                        </a>
                    </li>

                    <li class="twitter">
                        <a href="https://twitter.com/sharonkirigo" >
                            <img src="image/twitter.png">
                        </a>
                    </li>
                    <li class="pinterest">
                        <a href="https://www.pinterest.com/kirigokaranja/" >
                            <img src= image/pinterest.png >
                        </a>
                    </li>
                    <li class="instagram">
                        <a href="https://www.instagram.com/___kirigo/?hl=en" >
                            <img src="image/in.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <br><br> <br><br><br><br>
        <div class="bottom-bar" style="position: relative; text-align: center; color: ghostwhite; font-size: larger"  >
            All Rights Reserved © 2017 | <p style="color: ghostwhite; font-family: Pristina; font-size: large">Doctor Online<sup>TM</sup></p>
        </div>

    </footer>
    <!--footer ends-->

    <!-- responsive navbar javascript-->
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

</body>
</html>
