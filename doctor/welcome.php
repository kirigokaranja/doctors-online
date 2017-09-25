<?php
session_start();
echo 'Welcome '.$_SESSION['UserName'];
session_destroy();
exit();



