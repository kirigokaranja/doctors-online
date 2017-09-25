<html>
<head>
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
        /**navbar ends-- **/

        /**sign up form starts-- **/
        body{
            background-image: url("image/hush.jpg");
            background-repeat: no-repeat;
        }
        input[type=submit]{
            background-color: grey;
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
        input[type=text],input[type=email] , input[type=password] , select{
            width: 40%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top:  6px;
            margin-bottom: 16px;
            resize: vertical;
            border-radius: 6px;
        }
        #formDiv{

            width: 40%;
            opacity: 0.8;
            margin-left: 600px;
            margin-top: 30px;
            border: 1px solid #CCC;
            background-color: black;
            border-radius: 8px;
        }
        /**sign up form ends-- **/
    </style>
</head>
<body>
<!-- navbar starts-->
<div class="topnav" id="myTopnav">
    <a style="float: left; padding: 0px 16px; margin-left: 30px;" href="index.php"><img src="image/logo.jpg" height="140"></a>
    <a  style="margin-top: 15px;" href="login.php">Login <img src="image/manuser.png" height="20"></a>
    <a  style="margin-top: 15px; " href="index.php">Home</a>
    <a href="javascript:void(0);" style="font-size:35px;" class="icon" onclick="myFunction()">&#9776;</a> <!-- navbar icon-->
</div>
<!-- navbar ends-->

<!-- signup form starts -->
<div class="form">
    <div id = "formDiv">
<br><br>
        <form method="POST" action="signup.php" enctype="multiple/form-data">
            &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<input type="text"  name="surname" placeholder="Your Surname"> <br>
            &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<input type="text"  name="firstname" placeholder="Your Firstname"><br>
            &emsp;&emsp;&emsp;&emsp;&emsp;<input type="email"  name=" Your email" placeholder="Your Email"><br>
            &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<input type="password"  name="password" placeholder="Your password"><br>
            &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<input type="text"  name="sage" placeholder="Your Age"><br>
            &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<select class="a">
                <option >Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>
            <input class="a" type="submit" name="submit"/>
        </form>
    </div>
</div>
<!-- signup form ends -->
</body>
</html>