<?php
session_start();
include ("connect.php");

?>

<html>
<head>
    <style>
        table{
            text-align: center;
            border-collapse: collapse;
            width: 60%;
            height: 20%;
            background-color: grey;
            font-size: larger;
        }
        th{
            border-right: solid 1px black;
            border-top: solid 1px black;
            border-left: solid 1px black;
            padding: 15px;
         }
        td{
            border-right: solid 1px black;
            border-bottom: solid 1px black;
            border-left: solid 1px black;
            padding: 15px;
        }
    </style>
</head>
<body>
<table >
    <tr >
        <th>Number of Messages</th>
        <th>Number of Feedback</th>
        <th>Number of Customers</th>
    </tr>
    <tr>
        <td>7</td>
        <td>7</td>
        <td>7</td>
    </tr>
</table>
<br><br>
<table>
    <tr>
        <th colspan="2">Number of Doctors</th>
        <th colspan="2">Number of Consultations</th>
    </tr>
    <tr>
        <td><b>Activated</b><br>7</td>
        <td><b>Deactivated</b><br>7</td>
        <td><b>Pending</b><br>7</td>
        <td><b>Viewed</b><br>7</td>
    </tr>
</table>

</body>

</html>


