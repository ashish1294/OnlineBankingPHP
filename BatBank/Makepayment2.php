<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(isset($_POST['pay']))
{
$payto = $_POST['payto'];
$payamt = $_POST['pay_amt'];
$payacno= $_POST['ac_no'];
$result1 = mysql_query("select * from registered_payee WHERE slno='$payto'");
if(mysql_num_rows($result1) == 1)
{$arrpayment = mysql_fetch_array($result1); $payeetype='ext';}
else
{
    $result1= mysql_query("SELECT * FROM customers WHERE customerid='$_POST[payto]'");
    $arrpayment1 = mysql_fetch_array($result1);
    $payeetype='int';
    $arrpayment['payeename'] = $arrpayment1['firstname']." ".$arrpayment1['lastname'];
    $arrpayment['bankname'] = "Bank of Gotham City";
    $res1=mysql_query("SELECT * FROM accounts WHERE customerid='$_POST[payto]'");
    $arrpayment4 = mysql_fetch_array($res1);
    $arrpayment['accounttype'] = $arrpayment4['accounttype'];
    $arrpayment['accountnumber'] = $arrpayment4['accno'];
    $arrpayment['ifsccode'] = $arrpayment1['ifsccode'];
}
}
$dt = date("Y-m-d h:i:s");
$custid=  mysql_real_escape_string($_SESSION['customerid']);
$resultpass = mysql_query("select * from customers WHERE customerid='$custid'");
$arrpayment1 = mysql_fetch_array($resultpass);

if(isset($_POST["pay2"]))
{
        if (!($_POST['trpass'] == $_POST['conftrpass']))
        {
            $passerr = "Password Mismatch";
            header('Location:Makepayment.php?error=passwordmismatch');
            exit(0);
        }
	else if($_POST['trpass'] == $arrpayment1['transpassword'])
	{
            $rr = mysql_query("SELECT * FROM accounts WHERE customerid ='".$_SESSION['customerid']."'");
            $rrarr=  mysql_fetch_array($rr);
		$amount=$_POST['payamt'];
                if ($amount>$rrarr['accountbalance'])
                {
                    header('Location:Makepayment.php?error=insufficientbalance');
                    exit(0);
                }
                
                if (isset($_POST['payeetype']))
                {
                    
                    if ($_POST['payeetype'] == 'int')
                    {     mysql_query("UPDATE accounts SET accountbalance = accountbalance+$amount WHERE customerid ='".$_POST[payto]."'") or die(mysql_error ());
                    }
                }
                $sql="INSERT INTO transactions (paymentdate,payeeid,receiveid,amount,paymentstat) VALUES ('$dt','$_SESSION[customerid]','$_POST[payto]','$amount','active')";
                
                mysql_query("UPDATE accounts SET accountbalance = accountbalance-$amount WHERE customerid ='".$_SESSION['customerid']."'");
		
				if (!mysql_query($sql))
				  {
				  die('Error: ' . mysql_error());
				  }
				if(mysql_affected_rows() == 1)
				  {
					$successresult = "Transaction successfull";
					header("Location: Makepayment3.php");
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
	}
	else
	{
	$passerr = "Invalic password entered!!!<br/> Transaction Failed </b>";
        header('Location:MakePayment.php?error='.$passerr);
        exit(0);
	}		  
}

$custid=  mysql_real_escape_string($_SESSION['customerid']);
$acc= mysql_query("select * from accounts where customer_id='$custid'");

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
        <form id="form1" name="form1" method="post" action="Makepayment2.php">
  

      
     	<h2>&nbsp;Make payment to <?php if(isset($arrpayment['payeename'])) echo $arrpayment['payeename']; ?></h2>
              <table width="564" height="220" border="1">
                <?php
				if(isset($passerr))
				{
					?>
                <tr>
                  <td colspan="2">&nbsp;<?php echo $passerr; ?></td>
                </tr>
                <?php
				}
				?>
                <tr>
                  <td width="203"><strong>Pay to</strong></td>
                  <td width="322">
				  <?php
				echo "<b>&nbsp;Payee Name : </b>".$arrpayment['payeename'];
				echo "<br><b>&nbsp;Account No. : </b>".$arrpayment['accountnumber'];
				echo "<br><b>&nbsp;Account type : </b>".$arrpayment['accounttype'];
				echo "<br><b>&nbsp;Bank name : </b>".$arrpayment['bankname'];
				echo "<br><b>&nbsp;IFSC Code : </b>".$arrpayment['ifsccode'];
	
                  ?>
                  
<input type="hidden" name="payto" value="<?php echo $payto; ?>"  />
<input type="hidden" name="payamt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="payeeid" value="<?php echo $payacno; ?>"  />
<input type="hidden" name="payeetype" value="<?php echo $payeetype; ?>"  />
				  </td>
                </tr>
                <tr>
                  <td><strong>Payment amount</strong></td>
                  <td>&nbsp;<?php echo number_format($payamt,2); ?></td>
                </tr>
                <tr>
                  <td><strong>Account number</strong></td>
                  <td>&nbsp;<?php echo $payacno; ?></td>
                </tr>
                <tr>
                  <td><strong>Enter Transaction Password</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" /></td>
                </tr>
                <tr>
                  <td><strong>Confirm Password</strong></td>
                  <td><input name="conftrpass" type="password" id="conftrpass" size="35" /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                    <input name="button" type="button" onclick="<?php echo "window.location.href='accountalerts.php'"; ?>" value="Cancel" alt="Pay Now" />
                  </div></td>
                </tr>
              </table>
       	  </form>
    </div>
    
    <div id="sidebar">
         <h2>Transfer Funds</h2>
                
                <ul>
                <li><a href="addexternalpayee.php">Add External Payee</a></li>
                <li><a href="viewexternalpayee.php">View registered Payee</a></li>
                <li><a href="Makepayment.php">Make a Payement</a></li>
                <li><a href="Transactionmade.php?pst=Complete">Payements Made</a></li>
                </ul>
    </div>
</div><


<?php include'footer.php' ?>
    </div>
</body>
</html>
