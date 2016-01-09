<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Society"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

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

$societyname = $_POST['societyname'];

$sql = "DELETE FROM $tbl_name WHERE Society_Name = '$societyname'";
if (!mysql_query($sql))
    {
        die('Error: ' . mysql_error());
    }
    else
        {
            echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Society-List.php">';
            echo "<center><font face='Verdana' size='3' color=red>
            You have successfully deleted the ".$societyname." Society!!!
            <br> <br> <br>
            Wait!!! You will be redirected in 3 seconds ...</font></center>";
        }
?>