<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
    header('Location:login.php?error=nologin');

$datetime=date("Y-m-d h:i:s");
if(isset($_POST["sendmsg"]))
{
    if(isset($_SESSION['customerid']))
    {
        $sql="INSERT INTO  mail(subject,message,mdatetime,senderid,reciverid) VALUES('$_POST[subject]','$_POST[message]','$datetime','$_SESSION[customerid]','$_POST[sendto]')";
    }
    
    if(isset($_SESSION['adminid']))
    {
        $sql="INSERT INTO  mail(subject,message,mdatetime,senderid,reciverid) VALUES('$_POST[subject]','$_POST[message]','$datetime','$_SESSION[adminid]','$_POST[sendto]')";
    }

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
$msgsuccess = mysql_affected_rows();
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
        <form method="post" action="">
            <h2 align="center" ><strong>COMPOSE MAIL</strong></h2>
            <br />  <br/>
             <?php if($msgsuccess == 1) echo "<h1> Message sent successfully...</h1>";
                   else
                   {?>    
                        <p>
                        <strong>SEND TO</strong>
                        <select name="sendto" id="sendto">
                        <?php
                            $result = mysql_query("SELECT * FROM customers");
                            if(isset($_SESSION['customerid']))
                            {while($rows = mysql_fetch_array($result))
                            {	if(!($rows['customerid']==$_SESSION['customerid']))
                                        echo "<option value='$rows[customerid]'>$rows[firstname] $rows[lastname]</option>";
                            }
  				echo "<option value='admin'>Administrator</option>";
                            }
                            else if(isset($_SESSION['adminid']))
                            {
                                while($rows = mysql_fetch_array($result))
                                {
                                    echo "<option value='$rows[customerid]'>$rows[firstname] $rows[lastname]</option>";
                                }
                            }
                        ?>
                        </select>
                        </p>
                        
                        <br /> <br/>
                        
                        <p>
                        <strong>SUBJECT</strong>
                            <input name="subject" type="text" id="subject" size="50">
                        </p>
                        
                        <br/><br/>
                        
                        <p>
                        <strong>MESSAGE</strong>
                            <textarea name="message" id="MESSAGE" cols="45" rows="5"></textarea>
                        </p>
                        <br/>
                        <p>
                            <input type="submit" name="sendmsg" id="sendmsg" value="SEND MESSAGE" />
                        </p>
                        <?php } ?>
       </form> 
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
