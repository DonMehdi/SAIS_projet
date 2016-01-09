<?php

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Society"; // Table name

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password") or die("Cannot connect");
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

$sql = mysql_query("SELECT User_Society_ID FROM User WHERE User_ID = '$userid'");
$output = mysql_fetch_array($sql);
$societyid = $output['User_Society_ID'];

$getsociety = mysql_query("SELECT Society_Name FROM $tbl_name WHERE Society_ID = '$societyid'");
$result = mysql_fetch_array($getsociety);
$user_society = $result['Society_Name'];

$target = "Master Plan/";

$target = $target.$user_society."_".basename($_FILES['file']['name']);

if (($_FILES["file"]["type"] == "application/msword") && !($_FILES["file"]["size"] < 20000)
&& !(file_exists("Master Plan/".$user_society."_". $_FILES["file"]["name"])))
    {
        move_uploaded_file($_FILES['file']['tmp_name'],$target);
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Committee-Master-Plan.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Uploaded File Name: ".$_FILES["file"]["name"]."<br><br>
        Uploaded File Size: ".($_FILES["file"]["size"]/1024)." Kb<br><br><br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
    }
    else
        {
            echo '<meta HTTP-EQUIV="REFRESH" content="5; url=Upload-Master-Plan.php">';
            echo "<center><font face='Verdana' size='3' color=red>
            Uploading Problem due to:<br><br>
            1- You didn't select a file to upload. OR<br><br>
            2- Size is greater than 2 Mb. OR<br><br>
            3- The file already exists. OR<br><br>
            4- Wrong file type.<br><br>
            Please try again!!!
            <br> <br> <br>
            Wait!!! You will be redirected in 5 seconds ...</font></center>";
        }
?>
