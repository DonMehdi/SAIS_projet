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
    }

if(!isset($_SESSION['session']))
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
<title>Change Password - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style1 {
	color: #669999;
}
.style2 {
	font-size: medium;
}
</style>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Change Password.psd) -->
<div align="center">
  <table id="Table_01" width="1024" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="6"> <img src="images/Change-Password_01.gif" width="137" height="768" alt=""></td>
      <td colspan="11"> <img src="images/Change-Password_02.gif" width="746" height="119" alt=""></td>
      <td rowspan="6"> <img src="images/Change-Password_03.gif" width="141" height="768" alt=""></td>
    </tr>
    <tr> 
      <td> <img src="images/Change-Password_04.gif" width="34" height="74" alt=""></td>
      <td> <a href="javascript:history.back(-1);"><img src="images/Change-Password_05.gif" alt="" width="121" height="74" border="0"></a></td>
      <td> <img src="images/Change-Password_06.gif" width="52" height="74" alt=""></td>
      <td> <img src="images/Change-Password_07.gif" width="121" height="74" alt=""></td>
      <td colspan="2"> <img src="images/Change-Password_08.gif" width="58" height="74" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Change-Password_09.gif" alt="" width="161" height="74" border="0"></a></td>
      <td> <img src="images/Change-Password_10.gif" width="51" height="74" alt=""></td>
      <td> <a href="About.php"><img src="images/Change-Password_11.gif" alt="" width="110" height="74" border="0"></a></td>
      <td colspan="2"> <img src="images/Change-Password_12.gif" width="38" height="74" alt=""></td>
    </tr>
    <tr> 
      <td colspan="11"> <img src="images/Change-Password_13.gif" width="746" height="184" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5" rowspan="2"> <img src="images/Change-Password_14.gif" width="331" height="330" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B"> 
	  <form action="Change_Password.php" method="post" style="height: 166px">
		  <span class="style1"><strong><span class="style2">&nbsp; Old Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :</span>&nbsp; 
		  <input align="middle" dir="ltr" maxlength="15" name="Password1" style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font: normal normal bold 100% serif; width: 181px; vertical-align: middle;" type="password"><br>
		  <br><span class="style2">&nbsp; New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp; 
		  <input align="middle" dir="ltr" maxlength="15" name="Password2" style="font-family: 'Times New Roman', Times, serif; font: normal normal bold 100% serif; width: 180px; vertical-align: middle;" type="password"><br><br>
		  <span class="style2">&nbsp; Re-Type Password&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp; 
		  <input align="middle" dir="ltr" maxlength="15" name="Password3" style="font-family: 'Times New Roman', Times, serif; font: normal normal bold 100% serif; width: 180px; vertical-align: middle;" type="password"><br>
		  </strong></span>
		  <br>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input name="Submit1" type="submit" value="Change" dir="ltr"></form>
			</td>
      <td rowspan="2"> <img src="images/Change-Password_16.gif" width="20" height="330" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Change-Password_17.gif" width="395" height="144" alt=""></td>
    </tr>
    <tr> 
      <td colspan="11"> <img src="images/Change-Password_18.gif" width="746" height="61" alt=""></td>
    </tr>
    <tr> 
      <td> <img src="images/spacer.gif" width="137" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="34" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="121" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="52" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="121" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="3" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="55" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="161" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="51" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="110" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="18" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="20" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="141" height="1" alt=""></td>
    </tr>
  </table>
  <!-- End ImageReady Slices -->
</div>
</body>
</html>