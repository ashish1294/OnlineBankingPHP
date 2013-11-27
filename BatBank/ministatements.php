<?php
session_start();
error_reporting(0);

include("dbconnection.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where accno='$_POST[accno]'");
while($rows = mysql_fetch_array($acc))
{
	$Accountnumber = $rows["accno"];
	$Accountbalance= $rows["accountbalance"];
}
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
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
<div id="toptabmenu">
    <ul>
            <li><a href="accountalerts.php">My accounts</a></li>
            <li><a href="transferfunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspass.php">Personalise</a></li>
            <li><a href="logout.php">logout</a></li>
    </ul>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <?php
if(isset($_POST[submit]))
{
?>
    	<h2>Mini statements</h2>

        	<form id="form1" name="form1" method="post" action="">
        	  <table width="561" border="1">
        	    <tr>
        	      <th colspan="2" scope="col">Balance Details <?php echo $_SESSION[customername]; ?>
                  [Details on <?php echo date("d-m-Y");?>]</th>
       	        </tr>
        	    <tr>
        	      <td width="275"><strong>Account number</strong></td>
        	      <td width="270"><?php echo $Accountnumber;?>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td><strong>Account Balance</strong></td>
        	      <td><?php echo $Accountbalance; ?>&nbsp;</td>
      	      </tr>
              
      	    </table>
        	  <br />
        	  <table width="558" border="1">
  <tr>
    <th colspan="4" scope="col">Transaction made</th>
    </tr>
  <tr>
    <td><strong>SI NO</strong></td>
    <td><strong>Date</strong></td>
    <td><strong>withdrawals</strong></td>
    <td><strong>Deposits</strong></td>
  </tr>
   <?php
                    $customid=$_SESSION['customerid'];
                    $count=1;
                   $query="SELECT * FROM transactions WHERE (payeeid='$customid') OR (receiveid='$customid')";
                   $result=mysql_query($query);
			  while(($arrvar = mysql_fetch_array($result))&&($count <= 3 ))
			  {
                                echo " <tr>
                                             <td>$count</td>
                                             <td>$arrvar[paymentdate]</td>";
                                if ($arrvar['payeeid']==$customid)
                                       echo "<td>$arrvar[amount]</td><td> </td>";
                              else if ($arrvar['receiveid']==$customid)
                                       echo "<td> </td> <td>$arrvar[amount]</td>";
                              echo "</tr>";
                              $count=$count+1;
			  }
			  ?>
</table>


       	  </form>
   <?php
}
else
{
	?>
           <h2>Select an Account Number</h2>
           	<form id="form1" name="form1" method="POST" action="">
        	  <table width="520" height="127" border="0">
        	    
        	    <tr>
        	      <td valign="top">Account number  <label for="ac_no"></label>
        	        <select name="accno" id="accno">
        	            <?php
        	           while($arrvar = mysql_fetch_array($result))
					  	{
        		        echo "<option value='$arrvar[accno]'>$arrvar[accno]</option>";
               			}
					   ?>
                  </select>
       	          <input type="submit" name="submit" id="submit" value="Select account number" /></td>
      	      </tr>
      	    </table>
       	  </form>
           <?php
}
?>
    </div>
    
    <div id="sidebar">
        <h2>My Accounts</h2>
               
                <ul>
                <li><a href="accountsummary.php">Accounts summary</a></li>
                <li><a href="ministatements.php">Mini statement</a></li>
                <li><a href="accdetails.php">Account details</a></li>
                <li><a href="stateacc.php">Statements of accounts</a><p>&nbsp;</p></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
