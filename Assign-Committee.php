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
$society_id = $row['User_Society_ID'];
?>

<html>
<head>
<title>Assign Committee - Student Activities Interaction System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
html {
overflow: auto;
}
.style1 {
	margin-top: 3px;
	text-align: center;
}
.style2 {
	font-size: medium;
	color: #669999;
}
.style3 {
	text-align: center;
}
</style>
<script type="text/javascript">
function selectAll(x) {
for(var i=0,l=x.form.length; i<l; i++)
if(x.form[i].type == 'checkbox' && x.form[i].name != 'sAll')
x.form[i].checked=x.form[i].checked?false:true
}
</script>
</head>
<body bgcolor="#002F43" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (Assign-Committee.psd) -->
<div align="center">
  <table id="Table_01" width="1025" height="769" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td rowspan="9"> <img src="images/Assign-Committee_01.gif" width="139" height="768" alt=""></td>
      <td colspan="12"> <img src="images/Assign-Committee_02.gif" width="747" height="119" alt=""></td>
      <td rowspan="9"> <img src="images/Assign-Committee_03.gif" width="138" height="768" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="119" alt=""></td>
    </tr>
    <tr> 
      <td colspan="2"> <img src="images/Assign-Committee_04.gif" width="34" height="73" alt=""></td>
      <td> <a href="Committee-Event.php"><img src="images/Assign-Committee_05.gif" alt="" width="105" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Assign-Committee_06.gif" width="73" height="73" alt=""></td>
      <td> <img src="images/Assign-Committee_07.gif" width="105" height="73" alt=""></td>
      <td> <img src="images/Assign-Committee_08.gif" width="65" height="73" alt=""></td>
      <td> <a href="mailto:mohammed_alagel@yahoo.com"><img src="images/Assign-Committee_09.gif" alt="" width="158" height="73" border="0"></a></td>
      <td> <img src="images/Assign-Committee_10.gif" width="65" height="73" alt=""></td>
      <td> <a href="About.php"><img src="images/Assign-Committee_11.gif" alt="" width="96" height="73" border="0"></a></td>
      <td colspan="2"> <img src="images/Assign-Committee_12.gif" width="46" height="73" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="73" alt=""></td>
    </tr>
    <tr> 
      <td colspan="6"> <img src="images/Assign-Committee_13.gif" width="317" height="247" alt=""></td>
      <td colspan="5" bgcolor="#0B0B0B" rowspan="5">
      <div style="overflow:auto; height:491px;width:407px;" class="style3">
      <form action="Assign_Committee.php" method="post">
          <strong><br class="style2"><span class="style2">&nbsp; Event ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		  :<span class="style1">
		  <input name="Event_ID" style="width: 180px" type="text" align="middle" value="<?php if (isset($_SESSION['Event_ID'])){echo $_SESSION['Event_ID'];} ?>"></span></span><br class="style2">
		  </strong>
        <br>
        <table border cellpadding=2 width="400" class="style1">
        <tr>
        <th><input type="radio" name="sAll" onclick="selectAll(this)"><font face="Verdana" size="2" color=red>Toggle Here To Select All</font></th>
        <th><input type="radio" name="sAll" onclick="selectAll(this)" checked><font face="Verdana" size="2" color=red>Toggle Here To Unselect All</font></th>
        </table>
        <?php
        $sql = mysql_query("SELECT * FROM $tbl_name WHERE User_Society_ID = $society_id AND User_Type != 1 AND User_Type != 2 AND User_Event_ID = 0 ORDER BY User_ID");

        Print "<table border cellpadding=2 width='400'>";
        while($result = mysql_fetch_array($sql)){
        Print "<tr>";
        Print "<th><font face='Verdana' size='2' color=red><input type='checkbox' name='id[]' value=".$result["User_ID"].">&nbsp;".$result["User_ID"]."&nbsp;</font>";
        Print "<th><font face='Verdana' size='2' color=red><input type='hidden' name='student_name[]'>&nbsp;".$result["User_First_Name"]." ".$result['User_Last_Name']."&nbsp;</font><br>";
        Print "<th><font face='Verdana' size='2' color=red><input type='hidden' name='pointer[]'>&nbsp;".$result["User_Position"]."&nbsp;</font><br>";}
        Print "</table>";?>
        <br>
        <br>
        <input name="Approve" type="submit" value="Assign" >
      </form>
      </div>
      </td>
      <td rowspan="6"> <img src="images/Assign-Committee_15.gif" width="22" height="515" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="247" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="5"> <img src="images/Assign-Committee_16.gif" width="12" height="268" alt=""></td>
      <td colspan="3"> <a href="Profile.php"><img src="images/Assign-Committee_17.gif" alt="" width="173" height="41" border="0"></a></td>
      <td colspan="2" rowspan="5"> <img src="images/Assign-Committee_18.gif" width="132" height="268" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="41" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Change-Password.php"><img src="images/Assign-Committee_19.gif" alt="" width="173" height="45" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="45" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3"> <a href="Logout.php"><img src="images/Assign-Committee_20.gif" alt="" width="173" height="56" border="0"></a></td>
      <td> <img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr> 
      <td colspan="3" rowspan="2"> <img src="images/Assign-Committee_21.gif" width="173" height="126" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="105" alt=""></td>
    </tr>
    <tr> 
      <td colspan="5"> <img src="images/Assign-Committee_22.gif" width="408" height="21" alt=""></td>
      <td> <img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr> 
      <td colspan="12"> <img src="images/Assign-Committee_23.gif" width="747" height="61" alt=""></td>
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