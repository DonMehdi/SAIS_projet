<?php

session_start();
session_destroy();
echo "<center><font face='Verdana' size='3' color=red>
You Have Successfully Logged Out!!!
<br> <br> <br>
Wait!!! You will be redirected in 3 seconds ...</font></center>";

header("Refresh: 3; URL=Main.php");

?>