<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "SAPS"; // Table name

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

if(isset ($_POST['id'])){$id = $_POST['id'];}
$status = "OK";

foreach ($id as $value)
{
$sql = "UPDATE $tbl_name SET SAPS_Status = 'Approved' WHERE SAPS_Student_ID = '$value'";

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
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Admin-SAPS-Point.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        You have successfully approved the SAPS!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
?>