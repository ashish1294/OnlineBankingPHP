<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}
if(isset($_REQUEST['Del']))
{
    $query = "DELETE FROM customers WHERE customerid = '$_REQUEST[custid]'";
    mysql_query($query);
    $query = "DELETE FROM accounts WHERE customerid = '$_REQUEST[custid]'";
    mysql_query($query);
    header("Location:viewcustomer.php?suc=1");
    exit(0);
}
$results = mysql_query("SELECT * FROM customers where customerid='$_GET[custid]'");
$custid=$_GET['custid'];
while($arrow = mysql_fetch_array($results))
{
	$custname = $arrow[firstname]." ".$arrow['lastname'];
	$ifsccode=$arrow[ifsccode];
	$loginid=$arrow[loginid];
	$accstatus=$arrow[accstatus];
	$city=$arrow[city];
    $state=$arrow[state];
	$country=$arrow[country];
    $accopendate=$arrow[accopendate];
    $lastlogin=$arrow[lastlogin];
}
$resultsd = mysql_query("SELECT * FROM accounts where customerid='$_GET[custid]'");
mysql_num_rows($resultsd);
?>
<html>
<head>
<link href="images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of Gotham City</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
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
        <br/><br/>
  <form id="form2" name="form2" method="post" action="">
    <blockquote>
      <table width="519" height="242" border="1" id="brtable">
        <tr>
          <th width="224" height="32" scope="col">
           
             &nbsp;CUSTOMER NAME

          </th>
          <td width="285"><?php echo $custname; ?></td>
        </tr>
        <tr>
          <td><strong>
            <label for="branch">&nbsp; BRANCH</label>
          </strong></td>
          <td>&nbsp;<?php echo $ifsccode; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="loginid">&nbsp; LOGIN ID</label>
          </strong></td>
          <td>&nbsp;<?php echo $loginid; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="accstatus">&nbsp; ACCOUNT STATUS</label>
          </strong></td>
          <td>&nbsp;<?php echo $accstatus; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="city">&nbsp; CITY</label>
          </strong></td>
          <td>&nbsp;<?php echo $city; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="state">&nbsp; STATE</label>
          </strong></td>
          <td>&nbsp;<?php echo $state; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="country">&nbsp; COUNTRY</label>
          </strong></td>
          <td>&nbsp;<?php echo $country; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="accopendate">&nbsp; ACCOUNT OPEN DATE</label>
          </strong></td>
          <td>&nbsp;<?php echo $accopendate; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="lastlogin">&nbsp; LAST LOGIN</label>
          </strong></td>
          <td>&nbsp;<?php echo $lastlogin; ?></td>
        </tr>
      </table>
  
        
        <br/><br/><br/>

    </blockquote>
    <table width="777" border="1" id="brtable">
      <tr>
        <th colspan="5" scope="col"><strong>CUSTOMER ACCOUNTS</strong></th>
        </tr>
      <tr>
        <th width="100" scope="col"><strong>ACCOUNT NO</strong></th>
        <th width="75" scope="col"><strong>STATUS</strong></th>
        <th width="90" scope="col"><strong>OPEN DATE</strong></th>
        <th width="90" scope="col"><strong>ACCOUNT TYPE</strong></th>
        <th width="85" scope="col"><strong>BALANCE</strong></th>
      </tr>
      <?php
	 while($arrow=mysql_fetch_array($resultsd))
	 {
	 ?>
        <tr>
        <td>&nbsp;<?php echo $arrow[accno];?></td>
        <td>&nbsp;<?php echo $arrow[accstatus];?></td>
        <td>&nbsp;<?php echo $arrow[accopendate];?></td>
        <td>&nbsp;<?php echo $arrow[accounttype];?></td>
        <td>&nbsp;<?php echo $arrow[accountbalance];?></td>
      </tr>
     <?php
     }
	 ?>
</table>
      <input type="hidden" value="<?php echo $custid ?>" name="custid">
      <input type="submit" value="Delete Customer" name="Del">
    <p>&nbsp;</p>
  </form>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
