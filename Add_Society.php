<?php
session_start();

$_SESSION['Name'] = $_POST['Name'];
$_SESSION['Category'] = $_POST['Category'];
$_SESSION['Address'] = $_POST['Address'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Society"; // Table name

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

function ID_Incremenet()
{
    $Result = mysql_query("SELECT MAX(Society_ID) FROM Society");
    $Row = mysql_fetch_row($Result);
    $id = $Row[0] + 1;
    return $id;
}

$society_id = ID_Incremenet();

$Name = $_POST['Name'];
$Category = $_POST['Category'];
$Address = $_POST['Address'];
$status = "OK";

if($Name == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Society.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the society name!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Category == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Society.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the category of the society!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Address == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Society.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the full address of the society!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($status=="OK")
    {
        $sql= "INSERT INTO $tbl_name (Society_ID,Society_Name,Society_Category,Society_Address)
               VALUES ('$society_id','$Name','$Category','$Address')";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
            echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Admin-Society.php">';
            echo "<center><font face='Verdana' size='3' color=red>
            The new Society/Club has been added to the database!!!
            <br> <br> <br>
            Wait!!! You will be redirected in 3 seconds ...</font></center>";

            unset($_SESSION['Name']);
            unset($_SESSION['Category']);
            unset($_SESSION['Address']);
    }
?>