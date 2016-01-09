<?php
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "SAIS"; // Database name
$tbl_name = "SAPS"; // Table name

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
<title>SAPS List - Student Activities Interaction System</title>
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
<!-- ImageReady Slices (SAPS-List.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/SAPS-List_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/SAPS-List_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/SAPS-List_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/SAPS-List_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Committee-SAPS-Point.php"><img src="images/SAPS-List_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/SAPS-List_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/SAPS-List_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/SAPS-List_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/SAPS-List_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/SAPS-List_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/SAPS-List_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/SAPS-List_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/SAPS-List_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5">
      <div style="overflow:auto; height:491px;width:407px;" class="style2">
      <form action="Delete_SAPS.php" method="post">
	  <div class="style1">
	  <?php
          $getID = mysql_query("SELECT * FROM User WHERE User_ID = '$userid'");
          $row = mysql_fetch_array($getID);
          $Society_ID = $row['User_Society_ID'];
          
	  $sql = mysql_query("SELECT * FROM $tbl_name WHERE SAPS_Status != 'Approved' AND SAPS_Society_ID = $Society_ID ORDER BY SAPS_Student_ID");
	  Print "<table border cellpadding=2>";
	  while($result = mysql_fetch_array($sql)){
	  Print "<tr>";
	  Print "<th><font face='Verdana' size='2' color=red>ID :</font></th> <td><font face='Verdana' size='2' color=red><a href=User-Details.php?User_ID=".urlencode($result['SAPS_Student_ID']).">".$result['SAPS_Student_ID']."</a></font></td> ";
          Print "<th><font face='Verdana' size='2' color=red>Name :</font></th> <td><font face='Verdana' size='2' color=red>".$result['SAPS_Student_Name']."</font></td> ";
	  Print "<th><font face='Verdana' size='2' color=red>Pointer :</font></th> <td><font face='Verdana' size='2' color=red>".$result['SAPS_Points']."</font></td> ";}
	  Print "</table>";?>
	  <br>
	  <br>
	  </div>
	  <div class="style1">
	  <?php $name= mysql_query("SELECT * FROM $tbl_name WHERE SAPS_Status != 'Approved' AND SAPS_Society_ID = $Society_ID ORDER BY SAPS_Student_ID"); ?>
	  <select name="studentid">
	  <option>-Select Student ID-</option>
	  <?php while($res= mysql_fetch_assoc($name))
	  { ?>
	  <option>
	  <?php echo $res['SAPS_Student_ID']; ?>
	  </option>
	  <?php }?>
	  </select>&nbsp;&nbsp;&nbsp; <input name="Delete" type="submit" value="Delete">
	  <?php $name= mysql_query("SELECT * FROM $tbl_name WHERE SAPS_Status != 'Approved' AND SAPS_Society_ID = $Society_ID ORDER BY SAPS_Student_ID"); ?>
	  <br></div>
	  </form>
	  </div>
      </td>
      <td rowspan="6"> <img src="images/SAPS-List_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/SAPS-List_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/SAPS-List_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/SAPS-List_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/SAPS-List_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/SAPS-List_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/SAPS-List_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/SAPS-List_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/SAPS-List_23.gif" width="747" height="61" alt=""></td>
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