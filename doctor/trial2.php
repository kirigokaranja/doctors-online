<?php

session_start();
include ("connect.php");
$user = $_SESSION['UserName'] ;

if(isset($_SESSION['UserName'])){
?>
<p> this is us now</p>

    <?php

}else{
    ?>
    <?Php
    session_destroy();


    ?>
    <P style="color: whitesmoke">You are Not logged in</P>
    <a href="login.php" style="color: red; font-size: 24px;"> Login</a>
<?php } ?>