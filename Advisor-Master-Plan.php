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
?>

<html>
<head>
<title>Advisor - Master Plan - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Advisor-Master Plan.psd) -->
<div align="center"></div>
<table id="Table_01" width="1025" height="769" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="15">
			<img src="images/Advisor-Master-Plan_01.gif" width="139" height="768" alt=""></td>
		<td colspan="17">
			<img src="images/Advisor-Master-Plan_02.gif" width="747" height="119" alt=""></td>
		<td rowspan="15">
			<img src="images/Advisor-Master-Plan_03.gif" width="138" height="768" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="119" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_04.gif" width="34" height="73" alt=""></td>
		
    <td> <a href="Advisor.php"><img src="images/Advisor-Master-Plan_05.gif" alt="" width="105" height="73" border="0"></a></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_06.gif" width="73" height="73" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_07.gif" width="105" height="73" alt=""></td>
		<td>
			<img src="images/Advisor-Master-Plan_08.gif" width="65" height="73" alt=""></td>
		
    <td colspan="3"> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Advisor-Master-Plan_09.gif" alt="" width="158" height="73" border="0"></a></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_10.gif" width="65" height="73" alt=""></td>
		
    <td> <a href="About.php"><img src="images/Advisor-Master-Plan_11.gif" alt="" width="96" height="73" border="0"></a></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_12.gif" width="46" height="73" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="73" alt=""></td>
	</tr>
	<tr>
		<td colspan="17">
			<img src="images/Advisor-Master-Plan_13.gif" width="747" height="8" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" rowspan="3">
			<img src="images/Advisor-Master-Plan_14.gif" width="308" height="239" alt=""></td>
		
    <td colspan="3"> <a href="Download-Master-Plan.php"><img src="images/Advisor-Master-Plan_15.gif" alt="" width="125" height="113" border="0"></a></td>
		<td rowspan="11">
			<img src="images/Advisor-Master-Plan_16.gif" width="18" height="507" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_17.gif" width="125" height="113" alt=""></td>
		<td rowspan="11">
			<img src="images/Advisor-Master-Plan_18.gif" width="18" height="507" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_19.gif" width="125" height="113" alt=""></td>
		<td rowspan="11">
			<img src="images/Advisor-Master-Plan_20.gif" width="28" height="507" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="113" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_21.gif" width="125" height="23" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_22.gif" width="125" height="23" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_23.gif" width="125" height="23" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="2">
			<img src="images/Advisor-Master-Plan_24.gif" width="125" height="113" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="images/Advisor-Master-Plan_25.gif" width="125" height="113" alt=""></td>
		<td colspan="3" rowspan="2">
			<img src="images/Advisor-Master-Plan_26.gif" width="125" height="113" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="103" alt=""></td>
	</tr>
	<tr>
		<td rowspan="8">
			<img src="images/Advisor-Master-Plan_27.gif" width="12" height="268" alt=""></td>
		
    <td colspan="3" rowspan="3"> <a href="Profile.php"><img src="images/Advisor-Master-Plan_28.gif" alt="" width="173" height="41" border="0"></a></td>
		<td colspan="2" rowspan="8">
			<img src="images/Advisor-Master-Plan_29.gif" width="123" height="268" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="10" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_30.gif" width="125" height="10" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_31.gif" width="125" height="10" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_32.gif" width="125" height="10" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="10" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="3">
			<img src="images/Advisor-Master-Plan_33.gif" width="125" height="113" alt=""></td>
		<td colspan="2" rowspan="3">
			<img src="images/Advisor-Master-Plan_34.gif" width="125" height="113" alt=""></td>
		<td colspan="3" rowspan="3">
			<img src="images/Advisor-Master-Plan_35.gif" width="125" height="113" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		
    <td colspan="3"> <a href="Change-Password.php"><img src="images/Advisor-Master-Plan_36.gif" alt="" width="173" height="45" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="45" alt=""></td>
	</tr>
	<tr>
		
    <td colspan="3" rowspan="2"> <a href="Logout.php"><img src="images/Advisor-Master-Plan_37.gif" alt="" width="173" height="56" border="0"></a></td>
		<td>
			<img src="images/spacer.gif" width="1" height="47" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_38.gif" width="125" height="9" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_39.gif" width="125" height="9" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_40.gif" width="125" height="9" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="9" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="2">
			<img src="images/Advisor-Master-Plan_41.gif" width="173" height="126" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_42.gif" width="125" height="113" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_43.gif" width="125" height="113" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_44.gif" width="125" height="113" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="113" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_45.gif" width="125" height="13" alt=""></td>
		<td colspan="2">
			<img src="images/Advisor-Master-Plan_46.gif" width="125" height="13" alt=""></td>
		<td colspan="3">
			<img src="images/Advisor-Master-Plan_47.gif" width="125" height="13" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="13" alt=""></td>
	</tr>
	<tr>
		<td colspan="17">
			<img src="images/Advisor-Master-Plan_48.gif" width="747" height="61" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="61" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="139" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="12" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="22" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="105" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="46" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="27" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="96" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="65" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="51" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="18" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="89" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="36" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="18" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="11" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="96" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="18" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="28" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="138" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>