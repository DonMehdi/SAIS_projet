<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "Society"; // Table name

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password") or die("Cannot connect");
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
<title>Society List - Student Activities Interaction System</title>
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
</style>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Society-List.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/Society-List_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Society-List_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/Society-List_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Society-List_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Admin-Society.php"><img src="images/Society-List_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Society-List_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Society-List_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Society-List_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Society-List_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Society-List_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Society-List_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Society-List_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Society-List_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5" class="style1">
      <div style="overflow:auto; height:491px;width:407px;" class="style2">
      <form action="Delete_Society.php" method="post">
	  <?php
	  $sql = mysql_query("SELECT * FROM $tbl_name ORDER BY Society_ID");
	  Print "<table border cellpadding=2>";
	  while($result = mysql_fetch_array($sql)){
	  Print "<tr>";
	  Print "<th><font face='Verdana' size='2' color=red>ID    :</font></th> <td><font face='Verdana' size='2' color=red>".$result['Society_ID']."</font></td> ";
	  Print "<th><font face='Verdana' size='2' color=red>Name  :</font></th> <td><font face='Verdana' size='2' color=red><a href=Society-Members.php?Society_Name=".urlencode($result['Society_Name']).">".$result['Society_Name']."</a></font></td> ";}
	  Print "</table>";?>
	  <br>
	  <br>
	  <div class="style1">
	  <?php $name= mysql_query("SELECT * FROM $tbl_name ORDER BY Society_ID"); ?>
	  <select name="societyname">
	  <option>-Select Society Name-</option>
	  <?php while($res= mysql_fetch_assoc($name))
	  { ?>
	  <option>
	  <?php echo $res['Society_Name']; ?>
	  </option>
	  <?php }?>
	  </select>&nbsp;&nbsp;&nbsp; <input name="Delete" type="submit" value="Delete">
	  <?php $name= mysql_query("SELECT * FROM $tbl_name ORDER BY Society_ID"); ?>
	  <br></div>
	  </form>
	  </div>
      </td>
      <td rowspan="6"> <img src="images/Society-List_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Society-List_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Society-List_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Society-List_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Society-List_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Society-List_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Society-List_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Society-List_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Society-List_23.gif" width="747" height="61" alt=""></td>
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