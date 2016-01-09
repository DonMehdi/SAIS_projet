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

if(!isset($_SESSION['session']) || $user_type != 2)
    {
        echo '<meta HTTP-EQUIV="REFRESH" content="3; url=Main.php">';
        echo "<center><font face='Verdana' size='3' color=red>
        Sorry, Please login first!!!
        <br> <br> <br>
        Wait!!! You will be redirected in 3 seconds ...</font></center>";
        session_destroy();
        die();
    }

if($user_type == 1)
    {
        $user_type_info = "ADMIN";
    }
elseif($user_type == 2)
    {
        $user_type_info = "ADVISOR";
    }
elseif($user_type == 3)
    {
        $user_type_info = "COMMITTEE";
    }
else
    {
        $user_type_info = "MEMBER";
    }
?>

<html>
<head>
<title>Advisor - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Advisor.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="15"> <img src="images/Advisor_01.gif" width="139" height="768" alt=""></td>
      <td colspan="17"> <img src="images/Advisor_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="15"> <img src="images/Advisor_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Advisor_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Advisor.php"><img src="images/Advisor_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Advisor_06.gif" width="73" height="73" alt=""></td>
      <td colspan="2"> <img src="images/Advisor_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Advisor_08.gif" width="65" height="73" alt=""></td>
      <td colspan="3"> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Advisor_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td colspan="3"> <img src="images/Advisor_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Advisor_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Advisor_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6" rowspan="4"> <img src="images/Advisor_13.gif" width="308" height="247" alt=""></td>
      <td colspan="10" bgcolor="#0B0B0B"> <font face='Verdana' color=red><marquee scrollamount="5" onmouseover="this.scrollAmount=0" onmouseout="this.scrollAmount=5">
      <?php echo "Welcome ".$row['User_First_Name']." ".$row['User_Last_Name']." to our SAIS!!! You are logged in as ".$user_type_info; ?></marquee></font></td>
      <td rowspan="12"> <img src="images/Advisor_15.gif" width="28" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="19" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Advisor-Committee.php"><img src="images/Advisor_16.gif" alt="" width="125" height="102" border="0"></a></td>
      <td rowspan="11"> <img src="images/Advisor_17.gif" width="18" height="496" alt=""></td>
      <td colspan="2"> <a href="Advisor-Event.php"><img src="images/Advisor_18.gif" alt="" width="125" height="102" border="0"></a></td>
      <td rowspan="11"> <img src="images/Advisor_19.gif" width="18" height="496" alt=""></td>
      <td colspan="3"> <a href="Advisor-Meeting.php"><img src="images/Advisor_20.gif" alt="" width="125" height="102" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="102" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Advisor_21.gif" width="125" height="23" alt=""></td>
      <td colspan="2"> <img src="images/Advisor_22.gif" width="125" height="23" alt=""></td>
      <td colspan="3"> <img src="images/Advisor_23.gif" width="125" height="23" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="23" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <a href="Advisor-Master-Plan.php"><img src="images/Advisor_24.gif" alt="" width="125" height="113" border="0"></a></td>
      <td colspan="2" rowspan="2"> <a href="Advisor-SAPS-Point.php"><img src="images/Advisor_25.gif" alt="" width="125" height="113" border="0"></a></td>
      <td colspan="3" rowspan="2"> <img src="images/Advisor_26.gif" width="125" height="113" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="103" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="8"> <img src="images/Advisor_27.gif" width="12" height="268" alt=""></td>
      <td colspan="3" rowspan="3"> <a href="Profile.php"><img src="images/Advisor_28.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="8"> <img src="images/Advisor_29.gif" width="123" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="10" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Advisor_30.gif" width="125" height="10" alt=""></td>
      <td colspan="2"> <img src="images/Advisor_31.gif" width="125" height="10" alt=""></td>
      <td colspan="3"> <img src="images/Advisor_32.gif" width="125" height="10" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="10" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="3"> <img src="images/Advisor_33.gif" width="125" height="113" alt=""></td>
      <td colspan="2" rowspan="3"> <img src="images/Advisor_34.gif" width="125" height="113" alt=""></td>
      <td colspan="3" rowspan="3"> <img src="images/Advisor_35.gif" width="125" height="113" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Advisor_36.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <a href="Logout.php"><img src="images/Advisor_37.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="47" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Advisor_38.gif" width="125" height="9" alt=""></td>
      <td colspan="2"> <img src="images/Advisor_39.gif" width="125" height="9" alt=""></td>
      <td colspan="3"> <img src="images/Advisor_40.gif" width="125" height="9" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="9" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Advisor_41.gif" width="173" height="126" alt=""></td>
      <td colspan="3"> <img src="images/Advisor_42.gif" width="125" height="113" alt=""></td>
      <td colspan="2"> <img src="images/Advisor_43.gif" width="125" height="113" alt=""></td>
      <td colspan="3"> <img src="images/Advisor_44.gif" width="125" height="113" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="113" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <img src="images/Advisor_45.gif" width="125" height="13" alt=""></td>
      <td colspan="2"> <img src="images/Advisor_46.gif" width="125" height="13" alt=""></td>
      <td colspan="3"> <img src="images/Advisor_47.gif" width="125" height="13" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="13" alt=""></td>
    </tr>
    <tr> 
      <td colspan="17"> <img src="images/Advisor_48.gif" width="747" height="61" alt=""></td>
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