<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
    header('Location:login.php?error=nologin');

if(isset($_GET["mailid"]))
{
	$mailres=mysql_query("SELECT * FROM mail where mailid='$_REQUEST[mailid]'");
        $mailarr=  mysql_fetch_array($mailres);
        if (!($mailarr['senderid']=='admin'))
        {
            $mailresult=  mysql_query("SELECT * FROM customers WHERE customerid='".$mailarr['senderid']."'");
            $mailresarr = mysql_fetch_array($mailresult);
            $sendername = $mailresarr['firstname']." ".$mailresarr['lastname'];
        }
        else
            $sendername='admin';
        if (!($mailarr['reciverid']=='admin'))
        {
            $mailresult=  mysql_query("SELECT * FROM customers WHERE customerid='".$mailarr['reciverid']."'");
            $mailresarr = mysql_fetch_array($mailresult);
            $receivername = $mailresarr['firstname']." ".$mailresarr['lastname'];
        }
        else
            $receivername='admin';
        if(mysql_num_rows($mailres)==0)
        {
            $mailerr="Mail Do No Exist/Mail Expired/Viewing Authorization Failed";
        }
        if (isset($_SESSION['customerid']))
        {
            if (!(($mailarr['senderid']==$_SESSION['customerid'])||($mailarr['reciverid']==$_SESSION['customerid'])))
                $mailerr="Mail Do No Exist/Mail Expired/Viewing Authorization Failed";
        }
        else
        { 
            if (!(($mailarr['senderid']=='admin')||($mailarr['reciverid']=='admin')))
                $mailerr="Mail Do No Exist/Mail Expired/Viewing Authorization Failed";
        }
}
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
    <?php if(isset($_SESSION['customerid'])) { ?>
    <ul>
            <li><a href="accountalerts.php">My accounts</a></li>
            <li><a href="transferfunds.php">Transfer funds</a></li>
            <li><a href="payloans.php">Pay loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="changetranspass.php">Personalise</a></li>
            <li><a href="logout.php">logout</a></li>
    </ul>
    <?php } else if (isset($_SESSION['adminid'])) { ?>
    <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="viewbranch.php">Settings</a></li>
            <li><a href="viewcustomer.php">customers</a></li>
            <li><a href="viewtransaction.php">Transactions</a></li>
            <li><a href="mailinbox.php">Mail</a></li>
            <li><a href="logout.php">logout</a></li>
    </ul>
    <?php } ?>
    
</div>
</div>

<div id="templatemo_main">
    <div id="sidecon">
        <h2 align="center">Read Mail</h2>
            <?php if(isset($mailerr))
                        echo"<h1>$mailerr</h1>";
                  else { ?>
         <table width="600" border="1" id="brtable">
             <tr>
                 <td>From:</td>
                 <td><?php echo $sendername ?></td>
             </tr>
             <tr>
                 <td>To:</td>
                 <td><?php echo $receivername ?></td>
             </tr>
             <tr>
                 <td>Subject:</td>
                 <td><?php echo $mailarr['subject'] ?></td>
             </tr>
             <tr>
                 <td>Time:</td>
                 <td><?php echo $mailarr['mdatetime'] ?></td>
             </tr>
             <tr>
                 <td>Message:</td>
                 <td><?php echo $mailarr['message'] ?></td>
             </tr>
         </table>
        <?php } ?>
    </div>
    
    <div id="sidebar">
         <h2>Mails</h2>
                
                <ul>
               <li><a href="mailinbox.php"><strong>Inbox</strong></a></li>
                <li><strong><a href="mailcompose.php">Compose</a></strong></li>
                <li><strong><a href="mailsent.php">Sent mail</a></strong>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
