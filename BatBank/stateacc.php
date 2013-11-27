<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');
$results = mysql_query("SELECT * FROM accounts where customerid='".$_SESSION['customerid']."'");
while($arrow = mysql_fetch_array($results))
{
	$acno = $arrow[accno];	
	$arrow[customerid];
	$status = $arrow[accstatus];	
	$primaryacc = $arrow[primaryacc];	
	$accopen = $arrow[accopendate];	
	$acctype = $arrow[accounttype];	
	$accbal = $arrow[accountbalance];	
	$unclearbalance = $arrow[unclearbalance];	
	$accruedinterest = $arrow[accuredinterest];
}
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
        <h2>STATEMENTS OF ACCOUNT</h2>
        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
        <form name="numtrans" action="">
            <table width="496" border="1">
        <tr>
            <td width="260">Last    <input type="number" name="numtran">
            Transaction <input type="submit" name="numtranbut" id="button2" value="DISPLAY" /> </td>
        </tr>
            </table>
        </form>
    
    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <table width="667" border="1">
      <tr>
        <td><strong>Date & Time</strong></td>
        <td><strong>Transaction ID</strong></td>
        <td><strong>Withdrawals</strong></td>
        <td><strong>Deposits</strong></td>
        <td><strong>Withdrawn By</strong></td>
        <td><strong>Deposited by</strong></td>
        <td><strong>Amount</strong></td>
      </tr>
    
    <?php 
        if (isset($_REQUEST['numtran']))
        {
            $customid=$_SESSION['customerid'];
            $count=1;
            $query="SELECT * FROM transactions WHERE (payeeid='$customid') OR (receiveid='$customid')";
            $result=mysql_query($query);
            while(($arrvar = mysql_fetch_array($result))&&($count <= $_REQUEST['numtran'] ))
            {
                                    echo " <tr> <td>".$arrvar[paymentdate]."</td> ";
                                
                                     echo"<td>".$arrvar['transactionid']."</td>";
                                    if ($arrvar['payeeid']==$customid)
                                    {   echo "<td>$arrvar[amount]</td><td> </td>";
                                        $q="SELECT * FROM registered_payee WHERE slno='".$arrvar['receiveid']."'";
                                         $r=  mysql_query($q);
                                     
                                     $rarry= mysql_fetch_array($r);
                                     echo "<td>$rarry[payeename]</td><td> </td>";
                                     echo "<td>$arrvar[amount]</td>";
                                    }
                              else if ($arrvar['receiveid']==$customid)
                              {echo "<td> </td> <td>$arrvar[amount]</td>";
                                  $r=  mysql_query("SELECT * FROM customers WHERE customerid='".$arrvar['payeeid']."'");
                                     $rarry= mysql_fetch_array($r);
                                       echo "<td> </td> <td>$rarry[firstname] $rarry[lastname] </td>";
                                       echo "<td>$arrvar[amount]</td>";
                              }
                              echo "</tr>";
                              $count=$count+1;
            }
        }
        else if (isset($_REQUEST['button']))
        {
            
                
        }
        
    ?>
      </table>
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
