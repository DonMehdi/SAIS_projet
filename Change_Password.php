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
$con = mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

$Password1 = $_POST['Password1'];
$Password2 = $_POST['Password2'];
$Password3 = $_POST['Password3'];

$Result = "SELECT User_Password FROM $tbl_name WHERE User_ID = $userid";
$row = mysql_query($Result);

//if($Password1 != $row[0])
//if($Password1 != $row['User_Password'])
if($Password1 != mysql_result($row, 0))
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Change-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Wrong password!!! Please enter your password...
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
else if(strlen($Password2) < 6 or strlen($Password2) > 15)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Change-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Password must be equal or more than 6 char legth and maximum 15 char lenght...
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
else if ($Password2 != $Password3)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Change-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The new password and Re-Type password fields must be the same...
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
else
    {
     $sql = mysql_query("UPDATE $tbl_name SET User_Password ='$Password2' Where User_ID='$userid'");
        if($sql)
        {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Change-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        You have changed your password successfully!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        }
    }
?>