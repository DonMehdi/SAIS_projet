<?php
session_start();

$_SESSION['ID'] = $_POST['ID'];
$_SESSION['First_Name'] = $_POST['First_Name'];
$_SESSION['Last_Name'] = $_POST['Last_Name'];
$_SESSION['Society'] = $_POST['Society'];
$_SESSION['Contact'] = $_POST['Contact'];
$_SESSION['Address'] = $_POST['Address'];
$_SESSION['Email'] = $_POST['Email'];

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "User"; // Table name

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

$sql = mysql_query("SELECT User_Type FROM $tbl_name WHERE User_ID = '$userid'");
$output = mysql_fetch_array($sql);
$user_type = $output['User_Type'];

$Society = $_POST['Society'];

$societyid = mysql_query("SELECT Society_ID FROM Society WHERE Society_Name = '$Society'");
$result = mysql_fetch_array($societyid);
$society_id = $result['Society_ID'];

function Random_Password()
{
    $chars = "abcdefghijkmnopqrstuvwxyz0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '';
    
    while ($i <= 5)
        {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
        }
        return $pass;
}

$user_type = $user_type +1;
$password = Random_Password();

$ID = $_POST['ID'];
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$Contact = $_POST['Contact'];
$Address = $_POST['Address'];
$Email = $_POST['Email'];
$Email = mysql_real_escape_string($Email);
$status = "OK";

if(strlen ($ID) != 10 || !is_numeric($ID) || $ID == NULL || $ID <=0 || $ID >= 1999999999)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Advisor.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The advisor ID should be a number and exactly 10 digits length between 0 and 1999999999 !!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($First_Name == NULL || $Last_Name == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Advisor.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please write the advisor first name and last name!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($society_id == 0 || $Society == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Advisor.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please write the correct name of the society!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($Contact == NULL || $Address == NULL)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Advisor.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Please write the contact number and the address of the advisor!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if (!stristr($Email,"@") OR !stristr($Email,"."))
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Add-Advisor.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The email address is not correct!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        exit ();
        $status= "NOTOK";
    }

if($status=="OK")
    {
    $sql= "INSERT INTO $tbl_name (User_ID,User_Password,User_Type,User_First_Name,User_Last_Name,User_Address,User_Contact,User_Email,User_Society_ID)
           VALUES ('$ID','$password','$user_type','$First_Name','$Last_Name','$Address','$Contact','$Email','$society_id')";

        if (!mysql_query($sql,$con))
        {
        die('Error: ' . mysql_error());
        }
        echo '<meta HTTP-EQUIV="REFRESH" content="10; url=Admin-Advisor.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        The new advisor has been added to the database!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 10 seconds ...
        <br><br><br>Your Auto-Generated Password is ==> ".$password.
        "<br><br>* You are advised to changed it as soon as you log in</font></center>";

        unset($_SESSION['ID']);
        unset($_SESSION['First_Name']);
        unset($_SESSION['Last_Name']);
        unset($_SESSION['Society']);
        unset($_SESSION['Contact']);
        unset($_SESSION['Address']);
        unset($_SESSION['Email']);
    }
?>