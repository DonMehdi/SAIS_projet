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

$Event_Name = urldecode($_GET['Event_Name']);

$getevent = mysql_query("SELECT * FROM Event WHERE Event_Name = '$Event_Name'");
$row = mysql_fetch_array($getevent);

$ID = $row['Event_ID'];
$Name = $row['Event_Name'];
$Start_Date = $row['Event_Start_Date'];
$End_Date = $row['Event_End_Date'];
$Start_Time = $row['Event_Start_Time'];
$End_Time = $row['Event_End_Time'];
$Venue = $row['Event_Venue'];
$Category = $row['Event_Category'];
$Budget = $row['Event_Budget_Required'];
$societyid = $row['Event_Society_ID'];
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
        text-align: center;
}
.style3 {
	text-align: left;
}
.style4 {
	font-size: medium;
	color: #669999;
}
.style5 {
	color: #669999;
}
.style6 {
	color: #669999;
	font-weight: bold;
}
.style7 {
	font-size: medium;
}
.style8 {
	color: #669999;
	font-weight: bold;
	font-size: medium;
}
.style9 {
	font-size: medium;
	color: #669999;
	text-decoration: underline;
}
.style10 {
	font-weight: normal;
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
      <td> <a href="javascript:history.back(-1);"><img src="images/Society-Members_05.gif" alt="" width="105" height="73" border="0"></a></td>
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
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5" class="style3">
      <div class="style3">
      <span class="style1"><span class="style3"><span class="style5">
        <strong>&nbsp;<span class="style7"><span class="style10"> </span>Event ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
        </span><span class="style10">
        <input name="Event_ID" style="width: 180px; vertical-align: middle;" type="hidden" class="style8">
        <span class="style7"><?php echo $ID;?></span>
        <br class="style4"><br class="style4"><span class="style7">&nbsp; <b>Event Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</b>
        </span>
        <input name="Event_Name" style="width: 180px; vertical-align: middle;" type="hidden" class="style8">
        <span class="style7"><?php echo $Name;?></span>
        <br class="style4"><br class="style7"></span><span class="style7">&nbsp;
        Event Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        :&nbsp; <span class="style10">
        <input name="Event_Start_Date" style="width: 76px; vertical-align: middle;" type="hidden" class="style8">
        <?php echo $Start_Date;?>&nbsp;</span>&nbsp;to<span class="style10">
        <input name="Event_End_Date" style="width: 76px; vertical-align: middle;" type="hidden" class="style8">&nbsp;<?php echo $End_Date;?></span></span><br class="style7"><br class="style7"><span class="style7">&nbsp;
        Event Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        :&nbsp; <span class="style10">
        <input name="Event_Start_Time" style="width: 76px; vertical-align: middle;" type="hidden" class="style8">
        <?php echo $Start_Time;?>&nbsp;&nbsp;</span>to<span class="style10">
        <input name="Event_End_Time" style="width: 76px; vertical-align: middle;" type="hidden" class="style8">&nbsp;<?php echo $End_Time;?></span></span><br class="style7"><br class="style7"><span class="style7">&nbsp;
        Event Venue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; <span class="style10">
        &nbsp;<input name="Event_Venue" style="width: 180px; vertical-align: middle;" type="hidden" class="style8"><?php echo $Venue;?></span></span><br class="style7"><br class="style4"></strong><span class="style7">
        <strong>&nbsp; Event Category&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; </strong>
        </span><strong>
        <input name="Event_Category" style="width: 180px; vertical-align: middle;" type="hidden" class="style8">
        </strong><span class="style7"><strong><?php echo $Category;?>
        </strong></span><strong><br class="style4"><br class="style4">
        </strong><span class="style7"><strong>&nbsp; Event Budget&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        :&nbsp; <span class="style10">
        <input name="Event_Budget" style="width: 180px; vertical-align: middle;" type="hidden" class="style8"><?php echo $Budget;?></span><br></strong></span></span></span></span>&nbsp;<strong><br class="style4">
        </strong><span class="style4"><strong>&nbsp; </strong> </span><span class="style6">
        <span class="style9"><strong>Event Committee</strong></span><strong><br class="style4">
        </strong></span><strong>&nbsp;
        </strong></div>
      <div style="overflow:auto; height:173px;width:407px;" class="style2">
      <?php
       $sql = mysql_query("SELECT * FROM User WHERE User_Event_ID = $ID ORDER BY User_ID");
          Print "<table border cellpadding=2>";
          while($result = mysql_fetch_array($sql)){
          Print "<tr>";
          Print "<th><font face='Verdana' size='2' color=red>ID:</font></th> <td><font face='Verdana' size='2' color=red>".$result['User_ID']."</font></td> ";
          Print "<th><font face='Verdana' size='2' color=red>Name:</font></th> <td><font face='Verdana' size='2' color=red>".$result['User_First_Name']." ".$result['User_Last_Name']."</font></td> ";
          Print "<th><font face='Verdana' size='2' color=red>Posistion:</font></th> <td><font face='Verdana' size='2' color=red>".$result['User_Position']."</font></td> ";}
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