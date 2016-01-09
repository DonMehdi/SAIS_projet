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
$Society_Name = urldecode($_GET['Society_Name']);

$society = mysql_query("SELECT Society_ID,Society_Category,Society_Address FROM Society WHERE Society_Name = '$Society_Name'");
$row = mysql_fetch_array($society);

$Society_ID = $row['Society_ID'];
$Society_Category = $row['Society_Category'];
$Address = $row['Society_Address'];
?>

<html>
<head>
<title>Society Members - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style1 {
	text-align: center;
}
html {
overflow: auto;
}
.style2 {
	margin-top: 3px;
}
.style3 {
	color: #669999;
}
.style5 {
	font-size: medium;
}
.style6 {
	font-size: medium;
	color: #669999;
	text-decoration: underline;
}
.style7 {
	font-size: medium;
	color: #669999;
}
</style>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Society-Members.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/Society-Members_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Society-Members_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/Society-Members_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Society-Members_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Society-List.php"><img src="images/Society-Members_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Society-Members_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Society-Members_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Society-Members_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Society-Members_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Society-Members_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Society-Members_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Society-Members_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Society-Members_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5">
        <span class="style1"><strong><span class="style3"><span class="style5">
        &nbsp; Society ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;
        <input name="Society_ID" style="width: 180px; vertical-align: middle;" type="hidden"><?php echo $Society_ID?><br><br>&nbsp; Society Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;
        <input name="Society_Name" style="width: 180px; vertical-align: middle;" type="hidden"><?php echo $Society_Name?><br><br>&nbsp; Society Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;
        <input name="Society_Category" style="width: 180px; vertical-align: middle;" type="hidden"><?php echo $Society_Category?><br><br>&nbsp; Society
        Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea dir="ltr" name="Address" style="height: 100px; width: 179px; position: relative; left: -10px; top: -14px;" cols="20" rows="1" contenteditable="false"><?php echo $Address;?></textarea></span></span></strong></span>
        <br><strong><span class="style7">&nbsp; </span><span class="style6">Society Members<br></span></strong>
        &nbsp;
      <div style="overflow:auto; height:205px;width:407px;" class="style2">
      <?php
      $sql = mysql_query("SELECT * FROM $tbl_name WHERE User_Society_ID = '$Society_ID' ORDER BY User_ID");
          Print "<table border cellpadding=2>";
          while($result = mysql_fetch_array($sql)){
          Print "<tr>";
          Print "<th><font face='Verdana' size='2' color=red>ID    :</font></th> <td><font face='Verdana' size='2' color=red>".$result['User_ID']."</font></td> ";
          Print "<th><font face='Verdana' size='2' color=red>Name  :</font></th> <td><font face='Verdana' size='2' color=red>".$result['User_First_Name']." ".$result['User_Last_Name']."</font></td> ";}
          Print "</table>";
      ?>
    </div>
    </td>
      <td rowspan="6"> <img src="images/Society-Members_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Society-Members_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Society-Members_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Society-Members_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Society-Members_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Society-Members_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Society-Members_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Society-Members_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Society-Members_23.gif" width="747" height="61" alt=""></td>
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