<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Event"; // Table name

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
$userid = $_SESSION['myusername'];

$getID = mysql_query("SELECT * FROM User WHERE User_ID = '$userid'");
$row = mysql_fetch_array($getID);
$user_type = $row['User_Type'];

if(isset ($_POST['id'])){$id = $_POST['id'];}
$status = "OK";

foreach ($id as $value)
{
if($user_type == 1)
    {
    $sql = "UPDATE $tbl_name SET Event_Status = 'Approved' WHERE Event_ID = '$value'";
    }

if($user_type == 2)
    {
    $sql = "UPDATE $tbl_name SET Event_Status = 'First Approved' WHERE Event_ID = '$value'";
    }

if (!mysql_query($sql))
    {
        die('Error: ' . mysql_error());
        exit ();
        $status= "NOTOK";
    }
 $status = "OK";
}

If($status=="OK")
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Approve-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        You have successfully approved the Event!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
?>