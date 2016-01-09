<?php
session_start();

$_SESSION['Event_ID'] = $_POST['Event_ID'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "User"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("Cannot connect");
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

$Event_ID = $_POST['Event_ID'];
if(isset ($_POST['id'])){$id = $_POST['id'];}
$status = "OK";

$getID = mysql_query("SELECT * FROM Event WHERE Event_ID = '$Event_ID'");
$row = mysql_fetch_array($getID);
$eventid = $row['Event_ID'];

if($eventid == NULL || $Event_ID == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Assign-Committee.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The event ID you've entered is not found in the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

foreach ($id as $value)
{
$sql = "UPDATE $tbl_name SET User_Event_ID = '$Event_ID' WHERE User_ID = '$value'";

if (!mysql_query($sql))
    {
        die('Error: ' . mysql_error());
        exit ();
        $status= "NOTOK";
    }
 $status = "OK";
 unset ($_SESSION['Event_ID']);
}

If($status=="OK")
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Committee-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        You have successfully assigned committee for the event!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
?>