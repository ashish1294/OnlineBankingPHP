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
     <div id="templatemo_main"><span class="main_top"></span> 
     <span class="helpheading">FREQUENTLY ASKED QUESTIONS..</span>
         <div id="faq">
             
                 <p class="q">1.&nbsp;&nbsp;&nbsp;&nbsp;What is Inter Bank Fund Transfer?</p>
<p>Ans::Inter Bank Transfer is a special service that allows you to transfer funds from your account with a Bank, to a Bank account with any other Bank in India.</td>

<p class="q">2.&nbsp;&nbsp;&nbsp;&nbsp;Can I transfer funds to an account in any Bank Branch in India through RTGS/NEFT?</p>
<p>Ans::NEFT -The acronym "NEFT" stands for National Electronic Funds Transfer. Funds are transferred to the credit account with the other participating Bank using RBI's NEFT service. RTGS -The acronym "RTGS" stands for Real Time Gross Settlement. The RTGS system facilitates transfer of funds from accounts in one bank to another on a "real time". The RTGS system is the fastest possible interbank money transfer facility available through secure banking channels in India.
The fund transfer through RTGS/NEFT can be done ONLY to any RTGS/NEFT enabled Bank Branch in India.</p>
<p class="q">3.&nbsp;&nbsp;&nbsp;&nbsp;Are there any BANK CHARGES levied for Online Interbank Fund Transfer through RTGS/NEFT?</p>
<p>Ans::Presently,our Bank do NOT levy any CHARGES for Online Interbank Fund Transfer through RTGS/NEF done from our Internet Banking Services.</p>
<p class="q">4.&nbsp;&nbsp;&nbsp;&nbsp;What is the mandatory requirement for doing an Online Interbank Fund Transfer through RTGS/NEFT?</p>
<p>Ans::The following information about the Beneficiary is mandatory -
Beneficiary Name
Beneficiary Address
Beneficiary Account Number
Beneficiary Account Type (only in case of NEFT)
IFSC Code of the Beneficiary's Bank Branch</p>
<p class="q">5.&nbsp;&nbsp;&nbsp;&nbsp;What are the timings for doing these Transactions?</p>
<p>Ans::Presently, the NEFT transactions can be done any time, however, credits to the beneficiary account shall be on same day/ immediate next working depending on the time of payment and beneficiary bank. Presently, the RTGS timings* on any given working day is as under -
Week Days 09:15 a.m. - 03:45 pm
Saturday 09:15 a.m. - 11:45 a.m.
*Timings, above are subject to change
</p>
<p class="q">6.&nbsp;&nbsp;&nbsp;&nbsp;Where do I find IFSC Code?</p>
<p>Ans::IFSC Code can be found on our Internet Banking Site, during the addition of Beneficiary based on the Beneficiary's Bank. Alternatively, it can also be found at our site.

</p>
<p class="q">7.&nbsp;&nbsp;&nbsp;&nbsp;What happens to the transaction, if the beneficiary details provided are incorrect OR erroneously beneficiary details are provided are incorrect?</p>
<p>Ans::Bank does not verify the Beneficiary Details given for outward NEFT transaction, and its fate entirely depends upon the Beneficiary Bank. If the beneficiary details provided matches at the Beneficiary Bank, the credit will be passed on, as per the details. But, in case the Beneficiary Bank rejects the transaction, for ANY reason, the customer account will be credited.
</p>
<p class="q">8.&nbsp;&nbsp;&nbsp;&nbsp;How should I avail this facility?</p>
<p>Ans::</p>
 </div>
    </div> <!-- end of main -->
    </div>
    <?php include'footer.php' ?>
</body>
</html>
