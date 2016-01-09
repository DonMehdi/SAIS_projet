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

$societyid = $row['User_Society_ID'];

$societyname = mysql_query("SELECT Society_Name FROM Society WHERE Society_ID = '$societyid'");
$rows = mysql_fetch_array($societyname);
$society_name = $rows['Society_Name'];
?>

<html>
<head>
<title>Add Committee - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style1 {
	color: #669999;
}
.style2 {
	color: #669999;
	font-weight: bold;
	font-size: medium;
}
.style3 {
	font-size: medium;
}
.style4 {
	color: #669999;
	font-weight: bold;
	font-size: x-small;
}
.style5 {
	font-size: medium;
	color: #669999;
}
</style>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Add-User.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/Add-Committee_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Add-Committee_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/Add-Committee_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Add-Committee_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Advisor-Committee.php"><img src="images/Add-Committee_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Add-Committee_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Add-Committee_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Add-Committee_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Add-Committee_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Add-Committee_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Add-Committee_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Add-Committee_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Add-Committee_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5"> 
	  <form action="Add_Committee.php" method="post" style="height: 475px">
		  <input name="ID" style="width: 180px" type="hidden" align="middle" class="style2">
		  <strong><span class="style1">
		  &nbsp;
		  <span class="style3">Committee ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span>&nbsp;
		  <input name="ID" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['ID'])){echo $_SESSION['ID'];} ?>" maxlength="10"><br>
		  <br>&nbsp; <span class="style3">First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :</span>&nbsp; </span></strong>
		  <input name="First_Name" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['First_Name'])){echo $_SESSION['First_Name'];} ?>"><br>
		  <br><strong><span class="style1">&nbsp; <span class="style3">Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :</span>&nbsp; </span></strong>
		  <input name="Last_Name" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['Last_Name'])){echo $_SESSION['Last_Name'];} ?>"><br>
		  <br><strong><span class="style1"><span class="style3">&nbsp; 
		  Club/Society&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :&nbsp; </span> </span>
		  <input name="Society" style="width: 180px" type="hidden" align="middle" class="style5">
		  <span class="style5"><?php echo $society_name; ?></span>
		  <br class="style5">
		  </strong>
		  <br><strong><span class="style1">&nbsp; <span class="style3">Position&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :</span>&nbsp; </span></strong>
		  <input name="Position" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['Position'])){echo $_SESSION['Position'];} ?>"><br>
		  <br><strong><span class="style1">&nbsp; <span class="style3">Contact Number &nbsp; 
		  :&nbsp;</span> </span></strong>
		  <input name="Contact" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['Contact'])){echo $_SESSION['Contact'];} ?>"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="style4"><strong>
		  &nbsp;Ex:
		  </strong>+60123456789</span><br><strong><span class="style1">&nbsp; <span class="style3">Address&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></strong>
		  <textarea cols="20" dir="ltr" name="Address" style="height: 100px; width: 179px; position: relative; left: -10px; top: -14px;"><?php if (isset($_SESSION['Address'])){echo $_SESSION['Address'];} ?></textarea><br><strong><span class="style1">&nbsp; <span class="style3">Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span> </span></strong>
		  <input name="Email" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['Email'])){echo $_SESSION['Email'];} ?>"><br><strong>
		  <span class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
		  <span class="style4">&nbsp;Ex: abc@abc.com</span></strong><span class="style2"><br></span>
		  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input dir="ltr" name="Submit1" type="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input dir="ltr" name="Reset1" type="reset" value="Reset"></form>
		</td>
      <td rowspan="6"> <img src="images/Add-Committee_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Add-Committee_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Add-Committee_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Add-Committee_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Add-Committee_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Add-Committee_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Add-Committee_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Add-Committee_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Add-Committee_23.gif" width="747" height="61" alt=""></td>
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