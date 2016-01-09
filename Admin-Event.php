<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "User"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("Cannot connect");
mysql_select_db("$db_name") or die("Cannot select DB");

session_start();
if(isset ($_SESSION['session']))
    {
    $userid = $_SESSION['myusername'];
    $result = mysql_query("SELECT * FROM $tbl_name WHERE User_ID = '$userid'");
    $row = mysql_fetch_assoc($result);

    $user_type = $row['User_Type'];
    }

if(!isset($_SESSION['session']) || $user_type != 1)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Main.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Sorry, Please login first!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        session_destroy();
        die();
    }
?>

<html>
<head>
<title>Admin - Event - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Admin-Event.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="15"> <img src="images/Admin-Event_01.gif" width="139" height="768" alt=""></td>
      <td colspan="17"> <img src="images/Admin-Event_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="15"> <img src="images/Admin-Event_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Admin-Event_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Admin.php"><img src="images/Admin-Event_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Admin-Event_06.gif" width="73" height="73" alt=""></td>
      <td colspan="2"> <img src="images/Admin-Event_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Admin-Event_08.gif" width="65" height="73" alt=""></td>
      <td colspan="3"> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Admin-Event_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td colspan="3"> <img src="images/Admin-Event_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Admin-Event_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Admin-Event_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="17"> <img src="images/Admin-Event_13.gif" width="747" height="8" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="8" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6" rowspan="3"> <img src="images/Admin-Event_14.gif" width="308" height="239" alt=""></td>
      <td colspan="3"> <a href="Event-List-NoDelete.php"><img src="images/Admin-Event_15.gif" alt="" width="125" height="113" border="0"></a></td>
      <td rowspan="11"> <img src="images/Admin-Event_16.gif" width="18" height="507" alt=""></td>
      <td colspan="2"> <a href="Approve-Event.php"><img src="images/Admin-Event_17.gif" alt="" width="125" height="113" border="0"></a></td>
      <td rowspan="11"> <img src="images/Admin-Event_18.gif" width="18" height="507" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_19.gif" width="125" height="113" alt=""></td>
      <td rowspan="11"> <img src="images/Admin-Event_20.gif" width="28" height="507" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="113" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Admin-Event_21.gif" width="125" height="23" alt=""></td>
      <td colspan="2"> <img src="images/Admin-Event_22.gif" width="125" height="23" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_23.gif" width="125" height="23" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="23" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Admin-Event_24.gif" width="125" height="113" alt=""></td>
      <td colspan="2" rowspan="2"> <img src="images/Admin-Event_25.gif" width="125" height="113" alt=""></td>
      <td colspan="3" rowspan="2"> <img src="images/Admin-Event_26.gif" width="125" height="113" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="103" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="8"> <img src="images/Admin-Event_27.gif" width="12" height="268" alt=""></td>
      <td colspan="3" rowspan="3"> <a href="Profile.php"><img src="images/Admin-Event_28.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="8"> <img src="images/Admin-Event_29.gif" width="123" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="10" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Admin-Event_30.gif" width="125" height="10" alt=""></td>
      <td colspan="2"> <img src="images/Admin-Event_31.gif" width="125" height="10" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_32.gif" width="125" height="10" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="10" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="3"> <img src="images/Admin-Event_33.gif" width="125" height="113" alt=""></td>
      <td colspan="2" rowspan="3"> <img src="images/Admin-Event_34.gif" width="125" height="113" alt=""></td>
      <td colspan="3" rowspan="3"> <img src="images/Admin-Event_35.gif" width="125" height="113" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Admin-Event_36.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <a href="Logout.php"><img src="images/Admin-Event_37.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="47" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Admin-Event_38.gif" width="125" height="9" alt=""></td>
      <td colspan="2"> <img src="images/Admin-Event_39.gif" width="125" height="9" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_40.gif" width="125" height="9" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="9" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Admin-Event_41.gif" width="173" height="126" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_42.gif" width="125" height="113" alt=""></td>
      <td colspan="2"> <img src="images/Admin-Event_43.gif" width="125" height="113" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_44.gif" width="125" height="113" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="113" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Admin-Event_45.gif" width="125" height="13" alt=""></td>
      <td colspan="2"> <img src="images/Admin-Event_46.gif" width="125" height="13" alt=""></td>
      <td colspan="3"> <img src="images/Admin-Event_47.gif" width="125" height="13" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="13" alt=""></td>
    </tr>
    <tr> 
      <td colspan="17"> <img src="images/Admin-Event_48.gif" width="747" height="61" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="61" alt=""></td>
    </tr>
    <tr> 
      <td> <img src="images/spacer.gif" width="139" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="12" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="22" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="105" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="46" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="27" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="96" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="9" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="65" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="51" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="18" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="89" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="36" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="18" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="96" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="18" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="28" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="138" height="1" alt=""></td>
      <td></td>
    </tr>
  </table>
  <!-- End ImageReady Slices -->
</div>
</body>
</html>