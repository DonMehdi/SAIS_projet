<?php
session_start();

if(!isset($_SESSION['session']))
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Main.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Sorry, Please login first!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        die();
    }
$userid = $_SESSION['myusername'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "User"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

$First_Name = $_POST['First_Name'];
$Last_Name= $_POST['Last_Name'];
$Address = $_POST['Address'];
$Contact = $_POST['Contact'];
$Email = $_POST['Email'];

$sql = "UPDATE $tbl_name SET User_First_Name = '$First_Name', User_Last_Name = '$Last_Name', User_Address = '$Address', User_Contact = '$Contact', User_Email = '$Email' WHERE User_ID = '$userid'";

if(mysql_query($sql))
    {
   echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Profile.php">';
   echo "<center><font face='Verdana' size='3' color=red>
        Your Profile has been updated successfully!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
    else
        {
            echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Profile.php">';
            echo "<center><font face='Verdana' size='3' color=red>
                 Opps!!!! There is something wrong...>> ". mysql_error().
                 " <<<br> <br> <br>
                 Wait!!! You will be redirected in 3 seconds ...</font></center>";
        }
?>