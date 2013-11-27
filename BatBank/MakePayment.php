<?php
session_start();
error_reporting(0);

include("dbconnection.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where customerid='".$_SESSION['customerid']."'");
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
            <?php if(isset($_REQUEST['error']))
                 {      if($_REQUEST['error']=='nodetails')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Deatils Missing or Invalid.<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error']=='passwordmismatch')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Password Mismatch<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error'] == 'insufficientbalance')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Insufficient Balance<br/>Payment Failed</h3>";
                        else
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">".$_REQUEST['error']."</h3>";
                 }
                            ?>
  
     	<h2>Make Payment</h2>
           	  <table width="591" height="177" border="1">
        	    <tr>
        	      <td><strong>Pay to</strong></td>
        	      <td><label>
        	        <select name="payto" id="payto">
        	        <?php   $result=  mysql_query("SELECT * FROM registered_payee");
					  while($arrvar = mysql_fetch_array($result))
			  {
				echo "<option value='".$arrvar['slno']."'>".$arrvar['payeename']."</option>";
			  }  
                          $result1= mysql_query("SELECT * FROM customers");
					  while($arrvar1 = mysql_fetch_array($result1))
			  {         if (!($arrvar1['customerid'] == $_SESSION['customerid']))
				echo "<option value='".$arrvar1['customerid']."'>".$arrvar1['firstname']." ".$arrvar1['lastname']."</option>";
			  }
			  ?>
                           
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>Payment amount</strong></td>
        	      <td>
        	        <input type="number" min="10" name="pay_amt" id="pay_amt"/>
                      </td>
      	      </tr>
        	    <tr>
        	      <td><strong>Select Account number</strong></td>
        	      <td><label>
        	        <select name="ac_no" id="ac_no">
        	 			<?php  while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='$rowsacc[accno]'>$rowsacc[accno]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="Pay" />
        	      </div></td>
       	        </tr>
      	    </table><p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p>        	  
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
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
