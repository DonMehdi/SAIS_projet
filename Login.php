<?php
session_start();
$_SESSION['session'] = $_POST['myusername'];
?>

<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "User"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

// username and password sent from form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql = "SELECT * FROM $tbl_name WHERE User_ID='$myusername' AND User_Password='$mypassword' AND User_Type = 1";
$sql1 = "SELECT * FROM $tbl_name WHERE User_ID='$myusername' AND User_Password='$mypassword' AND User_Type = 2";
$sql2 = "SELECT * FROM $tbl_name WHERE User_ID='$myusername' AND User_Password='$mypassword' AND User_Type = 3";
$sql3 = "SELECT * FROM $tbl_name WHERE User_ID='$myusername' AND User_Password='$mypassword' AND User_Type = 4";

$result = mysql_query($sql);
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);
$count1 = mysql_num_rows($result1);
$count2 = mysql_num_rows($result2);
$count3 = mysql_num_rows($result3);
// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    // Register $myusername, $mypassword and redirect to file "Admin.php"
    session_register("myusername");
    session_register("mypassword");
    header("location:Admin.php");
} else
    if ($count1 == 1) {
        // Register $myusername, $mypassword and redirect to file "Advisor.php"
        session_register("myusername");
        session_register("mypassword");
        header("location:Advisor.php");
    } else
        if ($count2 == 1) {
            // Register $myusername, $mypassword and redirect to file "Committee.php"
            session_register("myusername");
            session_register("mypassword");
            header("location:Committee.php");
        } else
            if ($count3 == 1) {
                // Register $myusername, $mypassword and redirect to file "Memeber.php"
                session_register("myusername");
                session_register("mypassword");
                header("location:Member.php");
            } else {
                echo "<center><font face='Verdana' size='3' color=red>
                Wrong Username or Password!!!
                <br> <br> <br>
                Wait!!! You will be redirected in 3 seconds ...</font></center>";
                header("Refresh: 3; URL=Main.php");
            }
?>