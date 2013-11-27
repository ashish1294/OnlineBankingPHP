<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!($_SESSION["adminid"]))
{
		header("Location: emplogin.php");
}

$i=date("Y-m-d");
if(isset($_POST["button2"]))
{
$sql="INSERT INTO employees (employee_name, loginid, password, emailid,contactno,createdat)
VALUES
('$_POST[empname]','$_POST[lgid]','$_POST[password]','$_POST[emid]','$_POST[contno]','$i')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  if(mysql_affected_rows() == 1)
	{
$succ = "EMPLOYEE RECORD ADDED SUCCESSFULLY...";
}
}
?>
<html>
<head>
<link href="images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of Gotham City</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />

<script language="javascript">
 function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
		//alert(charCode);
         if (charCode > 65 && charCode < 91 )
      	 {              
		 return true;
	 }
	 else if (charCode > 96 && charCode < 122 )
      	 {
		 return true;
	 }
	 else
	 {
        alert("should be alphabet");
	  	return false;
	 }
   }

</script>

<script type="text/javascript">
function valid()
{
if(isNaN(document.form1.contno2.value))
	{
		alert("ENTER THE NUMERIC VALUE FOR CONTACT NUMBER");
				return false;
	}
	
	if(document.form1.contno2.value=="")
	{
		alert("INVALID CONTACT NUMBER");
		return false;
	}
	if(document.form1.empname.value=="")
	{
		alert("INVALID EMPLOYEE NAME");
		return false;
	}
	if(document.form1.emid.value=="")
	{
		alert("INVALID E-MAIL ID");
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
        
        
        <h2>ADD EMPLOYEE</h2>
   	<p>
   <?php 
	echo $succ;
	 ?>  
   	</p>
   	  <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
   	    <table width="407" border="0">
   	      <tr>
   	        <th scope="col"><div align="left">EMPLOYEE NAME </div></th>
   	        <th scope="col"> <label for="empname"></label>
              <div align="left">
                <input type="text" name="empname" onKeyPress="return isNumberKey(event)"id="empname" >
            </div></th>
          </tr>
   	      
   	     
   	      <tr>
   	        <th scope="row"><div align="left"> CONTACT NUMBER</div></th>
   	        <td><label for="contno2"></label>
            <input type="text" name="contno2" id="contno2"></td>
          </tr>
   	      <tr>
   	        <th scope="row"><div align="left">E-MAIL ID </div></th>
   	        <td><label for="emid"></label>
              <div align="left">
                <input type="text" name="emid" id="emid" >
            </div></td>
          </tr>
   	      <tr>
   	        <th colspan="2" scope="row"> <div align="center">
   	          <input type="submit" name="button2" id="button2" value="ADD" />
            </div></th>
          </tr>
        </table>
      </form>
    </div>
    
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
