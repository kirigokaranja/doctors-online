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
    <div class="form">
        <form>
            <fieldset>
                <label class="label"> Name</label>
                &emsp;&emsp;&emsp;&ensp;&emsp;&ensp;<input type="text"  name="surname" placeholder="Surname"> <input type="text"  name="firstname" placeholder="Firstname"><br>
                <label class="label"> Email</label>
                &emsp;&emsp;&emsp;&emsp;&emsp;<input type="email" id="" name="email"><br>
                <label class="label"> Phone Number</label>
                &emsp;<input type="text" id="code" name="code" placeholder="Area code" style="width: 13%">--<input type="text" name="number" placeholder="phone number"><br>
                <label class="label"> Gender</label>
                &emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" id="" name="gender"><br>
                <label> Date of Birth</label>
                &emsp;&emsp;&emsp;<input type="date" name="dob" ><br>
                <label> Address</label>
                &emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" name="address" placeholder="Street Address" > <input type="text" name="city" placeholder="City/Town"><br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="code" placeholder="Postal Code"> <input type="text" name="country" placeholder="Country"><br>
                <hr>
                <label> Incase of Emergency ...</label><br><br>
                <label> Emergency Contact</label>
                <input type="text"  name="ermsurname" placeholder="Surname"> <input type="text"  name="ermfirstname" placeholder="Firstname"><br>
                <label> Relationship</label>
                &emsp;&emsp;&emsp;<input type="text" name="relationship"><br>
                <label> Contact Number</label>
                &emsp;&ensp;<input type="text" id="code" name="emcode" placeholder="Area code" style="width: 13%">--<input type="text" name="emnumber" placeholder="phone number"><br>
                <input type="submit" value="Submit Form" >
            </fieldset>
        </form>
    </div>
</div>

<!-- medical form section starts -->
</body>
</html>