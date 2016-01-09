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
    
$dirname = "Master Plan/";
$dir = opendir($dirname);
?>

<html>
<head>
<title>Download Master Plan - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Download-Master-Plan.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/Download-Master-Plan_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Download-Master-Plan_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/Download-Master-Plan_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Download-Master-Plan_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="javascript:history.back(-1);"><img src="images/Download-Master-Plan_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Download-Master-Plan_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Download-Master-Plan_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Download-Master-Plan_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Download-Master-Plan_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Download-Master-Plan_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Download-Master-Plan_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Download-Master-Plan_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Download-Master-Plan_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5">
      <?php while(false !== ($file = readdir($dir)))
	  {if(($file != ".") and ($file != "..")){echo("<center><a href='$dirname$file'>$file</a><center><br/>");}}?>
	  </td>
      <td rowspan="6"> <img src="images/Download-Master-Plan_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Download-Master-Plan_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Download-Master-Plan_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Download-Master-Plan_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Download-Master-Plan_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Download-Master-Plan_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Download-Master-Plan_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Download-Master-Plan_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Download-Master-Plan_23.gif" width="747" height="61" alt=""></td>
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