<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location: emplogin.php");
}

$m=date("Y-m-d");
if(isset($_POST["add"]))
{
$sql="INSERT INTO loantype (loantype,prefix,maximumamt,minimumamt,interest,status)
VALUES
('$_POST[loantype]','$_POST[prefix]','$_POST[maxamt]','$_POST[minamt]','$_POST[interest]','$_POST[accstatus]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$msg= "1 record added";
}
$sql2 = mysql_query("select * from loantype");
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
	if(document.form1.loantype.value=="")
	{
		alert("INVALID LOAN TYPE");
		return false;
	}
	if(document.form1.prefix.value=="")
	{
		alert("INVALID PREFIX");
		return false;
	}
	if(document.form1.maxamt.value=="")
	{
		alert("INVALID MAXIMUM AMOUNT");
		return false;
	}
	if(document.form1.minamt.value=="")
	{
		alert("INVALID MINIMUM AMOUNT");
		return false;
	}
	if(document.form1.interest.value=="")
	{
		alert("INVALID INTEREST");
		return false;
	}
	if(document.form1.status.value=="")
	{
		alert("INVALID STATUS");
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
          <table width="883" border="1" id="brtable">
    <tr>
      <th width="113" scope="col"><a href="viewbranch.php">BRANCH</a></th>
      <th width="133" scope="col"><a href="addaccountmaster.php">ACCOUNT TYPES</a></th>
      <th width="87" scope="col"><a href="viewemp.php">EMPLOYEES</a></th>
      <th width="162" scope="col"><a href="viewloantype.php">LOAN TYPE</a></th>
    </tr>
            </table>    
        <br/><br/><br/>
    <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
        <?php if(isset($msg)) echo $msg; ?>
        <table border="1">
            <tr>
                <td><label for="loantype">LOAN TYPE</label></td>
                <td><input type="text" name="loantype" id="loantype" /></td>
            </tr>
            <tr>
                <td><label for="prefix">PREFIX</label></td>
                <td><input type="text" name="prefix" id="prefix" /></td>
            </tr>
            <tr>
                <td><label for="maxamt">MAXIMUM AMOUNT</label></td>
                <td><input type="text" name="maxamt" id="maxamt" /></td>
            </tr>
            <tr>
                <td><label for="minamt">MINIMUM AMOUNT</label></td>
                <td><input type="text" name="minamt" id="minamt" /></td>
            </tr>
            <tr>
                <td><label for="interest">INTEREST</label></td>
                <td><input type="text" name="interest" id="interest" /></td>
            </tr>
            <tr>
                <td><label for="textfield">ACCOUNT STATUS</label></td>
                <td><select name="accstatus" id="accstatus">
                    <option value="">Select</option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add" id="add" value="ADD" /></td>
            </tr>
            
        </table>
        <br/><br/><br/><br/>
    </form>
    <table width="758" border="1">
      <tr>
        <th width="120" scope="col">LOAN  TYPE</th>
        <th width="101" scope="col">PREFIX</th>
        <th width="188" scope="col">MAXIMUM AMOUNT</th>
        <th width="162" scope="col">MINIMUM AMOUNT</th>
        <th width="79" scope="col">INTEREST</th>
        <th width="68" scope="col">STATUS</th>
      </tr>
      <?php
       while($arrayvar = mysql_fetch_array($sql2))
	  {
     echo " <tr>
        <td>&nbsp;$arrayvar[loantype]</td>
        <td>&nbsp;$arrayvar[prefix]</td>
        <td>&nbsp;$arrayvar[maximumamt]</td>
        <td>&nbsp;$arrayvar[minimumamt]</td>
        <td>&nbsp;$arrayvar[interest]</td>
        <td>&nbsp;$arrayvar[status]</td>
      </tr>
	  ";
	  }	
      ?>
     
    </table>
        
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
