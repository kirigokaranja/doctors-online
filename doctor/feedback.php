<html>
<head>
    <style>
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
        body{
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-left: 30%;
        }

        th, td {
            text-align: left;
            padding: 8px;

        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color:gray;
            color: white;
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
<!-- navbar ends--><br>
<h1> Consult Feedback</h1>
<table>
    <tr>
        <th>Consult Date</th>
        <th> Feedback</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
</table>
</body>
</html>