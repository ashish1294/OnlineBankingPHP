<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}
$emparray = mysql_query("select * from employees");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of Gotham City</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="shortcut icon">
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
    <table border="1" id="brtable">
    	<tr>
      <th colspan="6" scope="col"><a href="addemployee.php">ADD EMPLOYEE</a></th>
    </tr>
      <tr>
        <th width="105" scope="col">EMPLOYEE ID</th>
        <th width="93" scope="col">EMP NAME</th>
        <th width="144" scope="col">EMAIL ID</th>
        <th width="188" scope="col">CONTACT NO</th>
        <th width="132" scope="col">JOIN DATE</th>
      </tr>
      <?php	
 while($employee = mysql_fetch_array($emparray))
	  {
echo "
      <tr>
        <td>&nbsp;$employee[empid]</td>
        <td>&nbsp;$employee[employee_name]</td>
        <td>&nbsp;$employee[emailid]</td>
        <td>&nbsp;$employee[contactno]</td>
        <td>&nbsp;$employee[createdat]</td>
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
