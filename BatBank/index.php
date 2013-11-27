<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_SESSION['customerid']))
{
	header("Location: accountalerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: admindashboard.php");
}

?>
<html>
<head>
<link href="images/favicon.ico" rel="shortcut icon">
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
    <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="branches.php">Branches</a></li>
        <li><a href="help.php">Help & FAQ</a></li>
        <li><a href="">Downloads</a>
            <ul>
                <li><a href="downloads/New_Account.pdf">New Account form</a></li>
                 <li><a href="">Loan Forms</a>
                 <ul>
                <li><a href="downloads/home_loan_application_form.pdf">Home Loan</a></li>
                 <li><a href="downloads/Car_Loan_Application_Form.pdf">Car Loan</a></li>
                  <li><a href="downloads/Education_Loan_Application_Form.pdf">Educational Loan</a></li>
            </ul>
                 </li>
                  <li><a href="downloads/ChequeBook_Request.pdf">Cheque book request</a></li>
            </ul>
        </li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
    
</div>
</div>
     <div id="templatemo_main">
         <div id="content-slider" class="b">
    	<div id="slider" style="float:left">
        	<div id="mask">
            <ul>
           	<li id="first" class="firstanimation">
            
            <img src="images/img_1.jpg"/>
            
            </li>

            <li id="second" class="secondanimation">
            
            <img src="images/img_2.jpg"/>
            
            </li>
            
            <li id="third" class="thirdanimation">
           
            <img src="images/img_3.jpg"/>
            
            </li>
                        
            <li id="fourth" class="fourthanimation">
            <img src="images/img_4.jpg"/>
            </li>
                        
            <li id="fifth" class="fifthanimation">
            <img src="images/img_5.png"/>
            </li>
            </ul>
            </div>
            </div>
             <div class="ex"><div class="heading">ANNOUNCEMENTS</div><br/><div class="low">
                         <ul style="list-style-type:none;">
                         <li class="one">Board meeting on 11/07/2013<br/><br/></li>
                         <li class="two">Withdrawal limit of ATM rises<br/> from Rs 25000 to Rs 40000<br/><br/></li>
                         <li class="three">Annual return forms available at<br/> your nearest branches now.<br/><br/></li>
                         <li class="four">Fill your E-tax forms and submit<br/> within 30th July<br/><br/></li>
                         <li class="five">New account for BPL certificate <br/> holders for only 100Rs.<br/></li>
                         </ul>
                          
                 
</div></div>
     </div>
    <hr/><br/>
         <div class="home">
             <div class="begin"> <h2><a href="Register.php">Register For NetBanking Now!!</a></h2> <br/>Now monitor, transact and control your bank account online through our net banking service. 
             You can do multiple things from the comforts of your home or office with our Internet Banking - a one stop solution
             for all your banking needs.You can now get all your accounts details, submit requests and undertake a wide range of transactions online. Our E-Banking service 
             makes banking a lot more easy and effective.</div><br/><br/>
             <span id="feat" ><b><u>Features</u></b></span><br/><br/>
             <ul style="padding-left:2em;list-style-image:url('images/next_blue.png');align:middle;"><li><span class="subhead">Account Details</span><br/><br/>View your bank account details, account balance, download statements and more. Also view your Demat, 
                     Loan & Credit Card Account Details too all in one place.</li><br/>
                 <li><span class="subhead">Fund Transfer</span><br/><br/>Transfer fund to your own accounts,Other Gotham Bank accounts seamlessly.</li><br/>
                 <li><span class="subhead">Request Services</span><br/><br/>Give a request for Cheque book,Demand Draft,Stop Cheque Payment,Debit Card Loyalty Point Redemption etc.</li><br/>
                 <li><span class="subhead">Investment Services</span><br/><br/>View your complete Portfolio with the bank, Create Fixed Deposit, Apply for IPO </li><br/>
                 <li><span class="subhead">Value Added Services</span><br/><br/>Pay Utility bills for more than 160 billers, Recharge Mobile, Create Virtual Cards, Pay any Visa Credit Card bills,
Register for estatement and sms banking</li></ul><br/>
<div class="begin">Register now for Gotham Bank's internet banking service to get started and avail for you multiple utility services, all in a matter of a click. Getting started with our internet banking is real easy. 
All you need to do is follow a few simple steps and you are good to go. <a href="Register.php">Click here</a> for our registration process
<p>We at the B.O.G.C follow best-in-class online security practices in order to safeguard your information while you are banking online. We are constantly at task for preventing fraud and thereby making all your net banking transactions completely safe.
         </div>
         </div>
    </div> <!-- end of main -->
    </div>
    <?php include'footer.php' ?>
</body>
</html>
