<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location: login.php");
}

$m=date("Y-m-d");
if(isset($_POST["add"]))
{
$sql="INSERT INTO accountmaster (accounttype,prefix,minbalance,interest)
VALUES
('$_POST[acctype]','$_POST[prefix]','$_POST[minbalance]','$_POST[interest]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$msg= "1 record added";
}
$sql1 = mysql_query("select * from accountmaster");
?>
<html>
<head>
<link href="images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of Gotham City</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function valid()
{
	if(document.form1.acctype.value=="")
	{
		alert("INVALID ACCOUNT TYPE");
		return false;
	}
	if(document.form1.prefix.value=="")
	{
		alert("INVALID PREFIX");
		return false;
	}
	if(document.form1.minbalance.value=="")
	{
		alert("INVALID MINIMUMBALANCE");
		return false;
	}
	if(document.form1.interest.value=="")
	{
		alert("INVALID INTERST");
		return false;
	}
}
</script>
</head>
<body>
    <img id="contain" src="images/batman2.jpg">
    <div><img src="images/batman1.png" id="batimg1"><img src="images/batman1.png" id="batimg2"></div>
    <div id="bodycontent">

<div id="templatemo_wrapper">

    <div class="mainbox">
        <img src="images/logo.png" width="200" height="100" style="float:left; margin:2em 2em;">
        <div id="site_title">
        
            <h1 style="margin-top: 30px;"><a href="index.php" style="color:yellow; text-decoration: none; margin-left: 1em;"><span>The Bank of Gotham City</span></a></h1>
            <p style="float:right; margin-right: 2.2em; color: buttonface; font-family: Satisfy,cursive; font-size: 2.5em;">.......A Silent Guardian</p>
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
<div  id="toptabmenu">
    <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="viewbranch.php">Settings</a></li>
            <li><a href="viewcustomer.php">customers</a></li>
            <li><a href="viewtransaction.php">Transactions</a></li>
            <li><a href="mailinbox.php">Mail</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <?php if(isset($msg)) echo "<h1>$msg</h1>"; ?>
        <table width="883" border="1" id="brtable">
      <tr>
        <th width="113" scope="col"><a href="viewbranch.php">BRANCH</a></th>
        <th width="133" scope="col"><a href="addaccountmaster.php">ACCOUNT TYPES</a></th>
        <th width="87" scope="col"><a href="viewemp.php">EMPLOYEES</a></th>
        <th width="162" scope="col"><a href="viewloantype.php">LOAN TYPE</a></th>
      </tr>
    </table>
        <br/><br/><br/>
    <p>
    <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
      <table width="507" height="179" border="0">
        <tr>
          <th scope="row">ACCOUNT TYPE</th>
          <td><input type="text" name="acctype" id="acctype" /></td>
        </tr>
        <tr>
          <th scope="row">PREFIX</th>
          <td><input type="text" name="prefix" id="prefix" /></td>
        </tr>
        <tr>
          <th scope="row">MINIMUM BALANCE</th>
          <td><input type="text" name="minbalance" id="minbalance" /></td>
        </tr>
        <tr>
          <th scope="row">INTEREST</th>
          <td><input type="text" name="interest" id="interest" /></td>
        </tr>
        <tr>
          <th colspan="2" scope="row"><input type="submit" name="add" id="add" value="ADD" />
            <input type="submit" name="update" id="update" value="UPDATE" /></th>
        </tr>
      </table>
    </form>
    <table width="500" border="1">
        
      <tr>
        <th scope="col">ACCOUNT TYPE</th>
        <th scope="col">PREFIX</th>
        <th scope="col">MINIMUM BALANCE</th>
        <th scope="col">INTEREST</th>
      </tr>			
     <?php
      while($arrayvar = mysql_fetch_array($sql1))
	  {
echo "	  <tr>
        <td>&nbsp; $arrayvar[accounttype] </td>
        <td>&nbsp; $arrayvar[prefix]</td>
        <td>&nbsp; $arrayvar[minbalance] </td>
        <td>&nbsp; $arrayvar[interest]</td>
      </tr>";
	  }
	  ?>
    </table>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
