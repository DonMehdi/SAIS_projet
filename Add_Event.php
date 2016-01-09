<?php
session_start();

$_SESSION['Name'] = $_POST['Name'];
$_SESSION['Start_Date'] = $_POST['Start_Date'];
$_SESSION['End_Date'] = $_POST['End_Date'];
$_SESSION['Start_Time'] = $_POST['Start_Time'];
$_SESSION['End_Time'] = $_POST['End_Time'];
$_SESSION['Venue'] = $_POST['Venue'];
$_SESSION['Category'] = $_POST['Category'];
$_SESSION['Budget_Required'] = $_POST['Budget_Required'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Event"; // Table name

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
    $Result = mysql_query("SELECT MAX(Event_ID) FROM Event");
    $Row = mysql_fetch_row($Result);
    $id = $Row[0] + 1;
    return $id;
}

function checkDateFormat($date)
{
    if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
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

function checkTimeFormat($time)
{
    return preg_match('/(^([0-9]|[0-1][0-9]|[2][0-3]):([0-5][0-9])(\s{0,1})([AM|PM|am|pm]{2,2})$)|(^([0-9]|[1][0-9]|[2][0-3])(\s{0,1})([AM|PM|am|pm]{2,2})$)/xms',$time,$match) ? sprintf('%02d:%d%s', $match[1], $match[2], strtoupper($match[3])) : false;
}

$event_id = ID_Incremenet();

$Name = $_POST['Name'];
$Start_Date = $_POST['Start_Date'];
$End_Date = $_POST['End_Date'];
$Start_Time = $_POST['Start_Time'];
$End_Time = $_POST['End_Time'];
$Venue = $_POST['Venue'];
$Category = $_POST['Category'];
$Budget_Required = $_POST['Budget_Required'];
$status = "OK";

if($Name == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the event name!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(checkDateFormat($Start_Date) == False ||$Start_Date == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the event start date in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(checkDateFormat($End_Date) == False || $End_Date == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the event end date in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(checkTimeFormat($Start_Time) == False || $Start_Time == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the event start time in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(checkTimeFormat($End_Time) == False || $End_Time == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the event end time in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Venue == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the event venue!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Category == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the category of the event!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(!stristr($Budget_Required,"RM") || $Budget_Required == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the budget required for this event in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($status=="OK")
    {
        $sql= "INSERT INTO $tbl_name (Event_ID,Event_Name,Event_Start_Date,Event_End_Date,Event_Start_Time,Event_End_Time,Event_Venue,Event_Category,Event_Budget_Required,Event_Status,Event_Society_ID)
               VALUES ('$event_id','$Name','$Start_Date','$End_Date','$Start_Time','$End_Time','$Venue','$Category','$Budget_Required','','$societyid')";

        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Committee-Event.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The new Event has been added to the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        
        unset ($_SESSION['Name']);
        unset ($_SESSION['Start_Date']);
        unset ($_SESSION['End_Date']);
        unset ($_SESSION['Start_Time']);
        unset ($_SESSION['End_Time']);
        unset ($_SESSION['Venue']);
        unset ($_SESSION['Category']);
        unset ($_SESSION['Budget_Required']);
        }
?>