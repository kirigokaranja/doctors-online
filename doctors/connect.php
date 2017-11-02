<?php
global $db;
	$db=mysqli_connect("localhost", "root","") ;
	if (!$db) {
        die ("Could not connect to database" . mysqli_connect_error());
    }

	mysqli_select_db($db,'doctor') or die('Error selecting database : ' . mysqli_error());




