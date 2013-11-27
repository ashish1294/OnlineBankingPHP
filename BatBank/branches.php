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
if (isset($_SESSION['employeeid']))
{
    header("Location:employeeacount.php");
}
?>
<html>
<head>
<link href="images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of Gotham City</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
        <div class="image view"><img src="images/iron bank.jpg" alt="The Iron Bank" title="The Iron Bank" /><div class="mask">  
     <h2>CHAIRMAN</h2>  
     <p>Mr. Tony Stark</p><br/><br/>
     <h2>EXECUTIVE DIRECTOR</h2>  
     <p>Ms. Pepper Potts</p>
     
     </div></div>
         <div class="brcont"><h2>The Iron Bank</h2><br/>Our branch in New York city is also popularly known as "The Iron Bank", named after the legendary Iron Man. 
             As Tony Stark's newest financial institution, the Iron Bank has a proud tradition of providing friendly, 
             personalized service and convenient, full-service banking.Our experienced staff of banking professionals can answer your 
             questions and help you make the most of your money. We offer an array of traditional banking services such as checking, 
             savings, certificates of deposit, loan and individual retirement accounts plus, customer conveniences like 24-hour telephone 
             banking and area network of surcharge-free automated teller machines.Our staff also includes a team of experienced mortgage,
             consumer, commercial and agricultural lenders who can offer you competitive interest rates, local loan decisions and on-site
             loan servicing.<br/><br/>
             <span style="font-size:24px;color:red; text-shadow: 0 0 5px #fff,
                   0 0 10px #fff,
                   0 0 15px #fff,
                   0 0 20px #fff;"><u>BANKING HOURS</u></span><br/>
<table><tr><td id="td">Mon-Thur :</td><td> &nbsp;&nbsp;8:00 AM to 3:30 PM</td></tr>	
<tr><td id="td">Friday :</td><td> &nbsp;&nbsp;8:00 AM to 5:00 PM</td></tr>	
<tr><td id="td">Saturday :</td><td> &nbsp;&nbsp;8:30 AM to Noon</td></tr></table>
  </div><hr/><br/>
         <div style="border:thin solid silver; width:300px;height:230px; text-align:center;margin-left:15px;float:left;margin-top:2em;">
           <div id="cf4" class="hover">
              <div class="top" style="width:280;height:220;">
                  <h2>CEO</h2>  
     <p>Mr. Peter Parker</p><br/><br/>
     <h2>MANAGING DIRECTOR</h2>  
     <p>Ms. Mary Jane Watson</p></div>
              <img class="bottom" src="images/webster_bank.jpg" alt="Webster Bank" name="VidSet" width="280" height="220">
           </div>
              </div>
         <div class="web" ><h2>WEBSTER BANK</h2>
         As Spiderman's premium foundation,our branch in Boston known as the Webster Bank has been committed to helping individuals, families and businesses achieve 
         their financial goals. In that mission, Webster’s 3,000 bankers are guided by our core values, namely, to take personal 
         responsibility for meeting our customers’ needs; to respect the dignity of every individual; to earn trust through ethical behavior;
         to give of ourselves to our communities; and to work together to achieve outstanding results.<br/>
         Webster Bank provides consumer, business, government and institutional banking, as well as mortgage, financial planning, trust
         and investment services through Webster Private Bank. Webster has 294 ATMs and delivers superior customer service in person, on the phone,
         online, and through mobile devices.<br/><br/>
         <span style="font-size:24px;color:red; text-shadow: 0 0 5px #fff,
                   0 0 10px #fff,
                   0 0 15px #fff,
                   0 0 20px #fff;"><u>BANKING HOURS</u></span><br/>
<table><tr><td id="td">Mon-Fri :</td><td> &nbsp;&nbsp;9:00 AM to 4:30 PM</td></tr>	
<tr><td id="td">Saturday :</td><td> &nbsp;&nbsp;9:30 AM to 1:30 PM</td></tr></table>
         </div>
     </div>
   </div>
    <?php include'footer.php' ?>
</body>
</html>

