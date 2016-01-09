<?php
session_start();

$_SESSION['Student_Name'] = $_POST['Student_Name'];
$_SESSION['Student_ID'] = $_POST['Student_ID'];
$_SESSION['Points'] = $_POST['Points'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "SAPS"; // Table name

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

function ID_Incremenet()
{
    $Result = mysql_query("SELECT MAX(SAPS_ID) FROM SAPS");
    $Row = mysql_fetch_row($Result);
    $id = $Row[0] + 1;
    return $id;
}

$SAPS_Point_id = ID_Incremenet();

$Student_Name = $_POST['Student_Name'];
$Student_ID = $_POST['Student_ID'];
$Points = $_POST['Points'];
$status = "OK";

$result = mysql_query("SELECT * FROM User WHERE User_ID = '$Student_ID'");
$row = mysql_fetch_array($result);

$Full_Name = $row['User_First_Name'] . " " . $row['User_Last_Name'];
$user_type = $row['User_Type'];
$society_id = $row['User_Society_ID'];

if($Student_Name != $Full_Name || $Student_Name == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-SAPS-Point.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The Student Name you've entered is not found in the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(strlen ($Student_ID) != 10 || !is_numeric($Student_ID) || $Student_ID == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-SAPS-Point.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The student ID should be a number and exactly 10 digits length!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($user_type == 1 || $user_type == 2 || $Student_ID == $userid)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-SAPS-Point.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The data you have entered should belongs to a student and can't be you!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if(!is_numeric($Points) ||$Points < 0.0 || $Points > 4.0 || $Points == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-SAPS-Point.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please enter the pointer for the student in the correct format!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($status=="OK")
    {
        $sql= "INSERT INTO $tbl_name (SAPS_ID,SAPS_Student_Name,SAPS_Student_ID,SAPS_Points,SAPS_Status,SAPS_Society_ID)
               VALUES ('$SAPS_Point_id','$Student_Name','$Student_ID','$Points','',$society_id)";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
            echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Committee-SAPS-Point.php">';
            echo "<center><font face='Verdana' size='3' color=red>
            The new SAPS Point for the Student ".$Full_Name." has been added to the database!!!
            <br> <br> <br>
            Wait!!! You will be redirected in 3 seconds ...</font></center>";

            unset($_SESSION['Student_Name']);
            unset($_SESSION['Student_ID']);
            unset($_SESSION['Points']);
    }
?>