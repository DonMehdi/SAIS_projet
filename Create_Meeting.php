<?php
session_start();

$_SESSION['Date'] = $_POST['Date'];
$_SESSION['Time'] = $_POST['Time'];
$_SESSION['Venue'] = $_POST['Venue'];
$_SESSION['Agenda'] = $_POST['Agenda'];

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
$userid = $_SESSION['myusername'];

$getID = mysql_query("SELECT User_Society_ID FROM User WHERE User_ID = '$userid'");
$row = mysql_fetch_array($getID);
$societyid = $row['User_Society_ID'];

function ID_Incremenet()
{
    $Result = mysql_query("SELECT MAX(Meeting_ID) FROM Meeting");
    $Row = mysql_fetch_row($Result);
    $id = $Row[0] + 1;
    return $id;
}

function checkDateFormat($eventdate)
{
    if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $eventdate, $parts))
    {
        if(checkdate($parts[2],$parts[3],$parts[1]))
        {
            return true;
        }
        else
            return false;
    }
    else
        return false;
}

function checkTimeFormat($eventtime)
{
    return preg_match('/(^([0-9]|[0-1][0-9]|[2][0-3]):([0-5][0-9])(\s{0,1})([AM|PM|am|pm]{2,2})$)|(^([0-9]|[1][0-9]|[2][0-3])(\s{0,1})([AM|PM|am|pm]{2,2})$)/xms',$eventtime,$match) ? sprintf('%02d:%d%s', $match[1], $match[2], strtoupper($match[3])) : false;
}

$meeting_id = ID_Incremenet();

$Date = $_POST['Date'];
$Time = $_POST['Time'];
$Venue = $_POST['Venue'];
$Agenda = $_POST['Agenda'];
$status = "OK";

if(checkDateFormat($Date) == False || $Date == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Create-Meeting.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the meeting date in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(checkTimeFormat($Time) == False ||$Time == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Create-Meeting.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the meeting time in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Venue == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Create-Meeting.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the meeting venue!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Agenda == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Create-Meeting.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the meeting agenda in point form!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($status=="OK")
    {
        $sql= "INSERT INTO $tbl_name (Meeting_ID,Meeting_Date,Meeting_Time,Meeting_Venue,Meeting_Agenda,Meeting_Minutes,Meeting_Attendee,Meeting_Society_ID)
               VALUES ('$meeting_id','$Date','$Time','$Venue','$Agenda','Not yet updated','Not yet updated','$societyid')";

        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Committee-Meeting.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The new Event has been added to the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";

        unset($_SESSION['Date']);
        unset($_SESSION['Time']);
        unset($_SESSION['Venue']);
        unset($_SESSION['Agenda']);
    }
?>