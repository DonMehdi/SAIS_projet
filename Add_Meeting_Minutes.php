<?php
session_start();

$_SESSION['ID'] = $_POST['ID'];
$_SESSION['Meeting_Minutes'] = $_POST['Meeting_Minutes'];
$_SESSION['Attendees'] = $_POST['Attendees'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Meeting"; // Table name

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

if(!isset($_SESSION['session']))
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Main.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Sorry, Please login first!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        die();
    }

 $ID = $_POST['ID'];
 $Meeting_Minutes = $_POST['Meeting_Minutes'];
 $Attendees = $_POST['Attendees'];
 $status = "OK";

 $result = mysql_query("SELECT Meeting_ID FROM $tbl_name WHERE Meeting_ID = '$ID'");
 $row = mysql_fetch_array($result);
 $Meeting_ID = $row['Meeting_ID'];

 $target = "Meeting Minutes/";
 $target = $target.$Meeting_ID."_".basename($_FILES['file']['name']);
 
 move_uploaded_file($_FILES['file']['tmp_name'],$target);

if($Meeting_ID == NULL || $ID == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Meeting-Minutes.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The Meeting ID you've entered is not found in the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Meeting_Minutes == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Meeting-Minutes.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the meeting minutes in point form!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Attendees == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Meeting-Minutes.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the name(s) of the attendee(s) in the meeting!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

 if($status=="OK")
     {
        $sql= "UPDATE $tbl_name SET Meeting_Minutes = '$Meeting_Minutes', Meeting_Attendee = '$Attendees' WHERE Meeting_ID = '$ID'";

        if (!mysql_query($sql,$con))
        {
        die('Error: ' . mysql_error());
        }
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Committee-Minutes.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The Meeting Miuntes has been added to the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        unset ($_SESSION['ID']);
        unset ($_SESSION['Meeting_Minutes']);
        unset ($_SESSION['Attendees']);
    }
?>