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

if(!isset($_SESSION['session']) || $user_type != 3)
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
<title>Add Meeting Minutes - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style1 {
	color: #669999;
}
.style2 {
	color: #669999;
	font-size: medium;
}
.style3 {
	font-size: medium;
}
</style>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Add-Meeting Minutes.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/Add-Meeting-Minutes_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Add-Meeting-Minutes_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/Add-Meeting-Minutes_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Add-Meeting-Minutes_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Committee-Meeting.php"><img src="images/Add-Meeting-Minutes_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Add-Meeting-Minutes_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Add-Meeting-Minutes_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Add-Meeting-Minutes_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Add-Meeting-Minutes_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Add-Meeting-Minutes_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Add-Meeting-Minutes_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Add-Meeting-Minutes_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Add-Meeting-Minutes_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5"> 
	  <form enctype="multipart/form-data" action="Add_Meeting_Minutes.php" method="post" style="height: 475px">
		  <input name="ID" style="width: 180px" type="hidden" align="middle" class="style2">
	  	<br><strong><span class="style1">&nbsp; <span class="style2">Meeting 
		  ID&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span>&nbsp; 
		  <input name="ID" style="width: 211px" type="text" align="middle" value="<?php if (isset($_SESSION['ID'])){echo $_SESSION['ID'];} ?>"><br>
		  <br>&nbsp;<span class="style2">
		  <span class="style3">Meeting Minutes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<br>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <textarea cols="20" dir="ltr" name="Meeting_Minutes" style="height: 120px; width: 210px; position: relative; left: -10px; top: -14px;"><?php if (isset($_SESSION['Meeting_Minutes'])){echo $_SESSION['Meeting_Minutes'];} ?></textarea></span></span><br>&nbsp; <span class="style2">Meeting Attendee(s)&nbsp;&nbsp;:<br>
		  <span class="style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <textarea cols="20" dir="ltr" name="Attendees" style="height: 120px; width: 210px; position: relative; left: -10px; top: -14px;"><?php if (isset($_SESSION['Attendees'])){echo $_SESSION['Attendees'];} ?></textarea></span></span></span></strong><br>
		  <br><strong><span class="style2">Upload File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :</span></strong>
		  <input name="file" type="file" style="width: 213px" dir="ltr"><br><br>
		  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
		  <input dir="ltr" name="Submit1" type="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
		  <input dir="ltr" name="Reset1" type="reset" value="Reset"></form>
		</td>
      <td rowspan="6"> <img src="images/Add-Meeting-Minutes_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Add-Meeting-Minutes_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Add-Meeting-Minutes_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Add-Meeting-Minutes_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Add-Meeting-Minutes_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Add-Meeting-Minutes_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Add-Meeting-Minutes_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Add-Meeting-Minutes_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Add-Meeting-Minutes_23.gif" width="747" height="61" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="61" alt=""></td>
    </tr>
    <tr> 
      <td> <img src="images/spacer.gif" width="139" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="12" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="22" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="105" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="46" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="27" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="105" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="65" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="158" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="65" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="96" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="24" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="22" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="138" height="1" alt=""></td>
      <td></td>
    </tr>
  </table>
  <!-- End ImageReady Slices -->
</div>
</body>
</html>