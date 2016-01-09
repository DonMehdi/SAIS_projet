<?php

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "User"; // Table name

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

// Convert to simple variables
$ID = $_POST['ID'];
$Email = $_POST['Email'];
$Email = mysql_real_escape_string($Email);
$status = "OK";

$getdata = mysql_query("SELECT * FROM $tbl_name WHERE User_ID = '$ID'");
$row = mysql_fetch_array($getdata);
$getEmail = $row['User_Email'];

if(strlen ($ID) != 10 || !is_numeric($ID) || $ID == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Forgot-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The ID field should be a number and exactly 10 digits length!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if (!stristr($Email,"@") || !stristr($Email,".") || $Email == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Forgot-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the email in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if ($Email != $getEmail)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Forgot-Password.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Sorry!!! User ID and Email doesn't match...
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($status=="OK")
    {
        $sql = mysql_query("SELECT * FROM User WHERE User_ID = '$ID' AND User_Email = '$Email'");
        $row = mysql_fetch_array($sql);
        $user_password = $row['User_Password'];
        
        echo '<meta HTTP-EQUIV="REFRESH" content="10; url=Main.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Your password is ==>> ".$user_password."
        <br> <br> <br>
        Wait!!! You will be redirected in 10 seconds ...</font></center>";
    }
?>