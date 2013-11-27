<?php
session_start();
include("dbconnection.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');
$regdarray = mysql_query("SELECT * from registered_payee");
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
    <div id="sidecon" style="width:895px;">
        <h2>External Payee</h2>
       <table width="890" border="1">
      <tr>	
        <th width="80" scope="col">SL NO</th>
        <th width="93" scope="col">PAYEE NAME</th>
        <th width="101" scope="col">ACCOUNT NUMBER</th>
        <th width="144" scope="col">ACCOUNT TYPE</th>
        <th width="180" scope="col">BANK NAME</th>
        <th width="132" scope="col"><p>IFSC CODE</p></th>
      </tr>
      <?php	
 while($regd = mysql_fetch_array($regdarray))
	  {
echo "
      <tr>
        <td>&nbsp;$regd[slno]</td>
        <td>&nbsp;$regd[payeename]</td>
        <td>&nbsp;$regd[accountnumber]</td>
        <td>&nbsp;$regd[accountnumber]</td>
        <td>&nbsp;$regd[bankname]</td>
        <td>&nbsp;$regd[ifsccode]</td>
        
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
