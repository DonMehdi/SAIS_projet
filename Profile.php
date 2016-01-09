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

$result = mysql_query("SELECT User_First_Name, User_Last_Name, User_Address, User_Contact, User_Email FROM $tbl_name WHERE User_ID = '$userid'");
$row = mysql_fetch_array($result);

$First_Name = $row['User_First_Name'];
$Last_Name = $row['User_Last_Name'];
$Contact = $row['User_Contact'];
$Address = $row['User_Address'];
$Email = $row['User_Email'];
?>

<html>
<head>
<title>Profile - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style1 {
	font-size: medium;
	color: #669999;
}
</style>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Profile.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0" dir="ltr">
    <tr> 
      <td rowspan="10"> <img src="images/Profile_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Profile_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="10"> <img src="images/Profile_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Profile_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="javascript:history.back(-1);"><img src="images/Profile_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Profile_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Profile_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Profile_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Profile_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Profile_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Profile_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Profile_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Profile_13.gif" width="747" height="35" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="35" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Profile_14.gif" width="317" height="212" alt=""></td>
      <td colspan="5" rowspan="5" bgcolor="#0B0B0B"> 
	  <form action="Update_Profile.php" method="post" style="height: 431px">
	  	<br>&nbsp; <span class="style1"><strong>User ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :<input name="ID" style="width: 180px" type="hidden" align="middle">&nbsp;<?php echo " ". $userid?></strong></span><br><br>
		  <span class="style1"><strong>&nbsp; First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :&nbsp;
                  <input name="First_Name" style="width: 180px; vertical-align: middle;" type="text" value="<?php echo $First_Name?>"></strong></span><strong><br>
		  <br><span class="style1">&nbsp; Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :&nbsp;
		  <input name="Last_Name" style="width: 180px; vertical-align: middle;" type="text" value="<?php echo $Last_Name?>"></span><br class="style1">
		  <br class="style1"></strong><span class="style1"><strong>&nbsp; 
		  Contact Number :&nbsp;
		  <input name="Contact" style="width: 180px; vertical-align: middle;" type="text" value="<?php echo $Contact?>"></strong></span><strong><br class="style1">
		  <br class="style1"></strong><span class="style1"><strong>&nbsp; 
		  Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :</strong></span><strong><br class="style1"><span class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <textarea dir="ltr" name="Address" style="height: 100px; width: 179px; position: relative; left: -10px; top: -14px;"><?php echo $Address?></textarea></span><br class="style1">
		  <br class="style1"></strong><span class="style1"><strong>&nbsp; Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :&nbsp;
		  <input name="Email" style="width: 180px; vertical-align: middle;" type="text" value="<?php echo $Email?>"><br>
		  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </strong></span>
		  <input name="Submit1" type="submit" value="Update" dir="ltr"></form>
		</td>
      <td rowspan="6"> <img src="images/Profile_16.gif" width="24" height="480" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="212" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Profile_17.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Profile_18.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Profile_19.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Profile_20.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Profile_21.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Profile_22.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="100" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Profile_23.gif" width="406" height="26" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="26" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Profile_24.gif" width="747" height="61" alt=""></td>
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
      <td> <img src="images/spacer.gif" width="22" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="24" height="1" alt=""></td>
      <td> <img src="images/spacer.gif" width="138" height="1" alt=""></td>
      <td></td>
    </tr>
  </table>
  <!-- End ImageReady Slices -->
</div>
</body>
</html>