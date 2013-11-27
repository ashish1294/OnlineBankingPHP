<?php
session_start();
error_reporting(0);
$error=$_REQUEST['error'];
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
        <?php
         if($error==1)
            { ?> <div class="mainbox" style="width:550px;"><h1 style="font-size: 30px;">Data Missing or Invalid</h1><br/>
                  <ul style="color:#0FF; font-family:'The Girl Next Door',cursive; font-size: 20px; line-height: 20px; padding-left: 3em;">
                      <?php if($_REQUEST['fnameset']==1)
                            {
                                echo"<li>First Name cannot start with space or left blank</li>";
                            }
                            if($_REQUEST['lnameset']==1)
                            {
                                echo"<li>Last Name cannot start with space or left blank</li>";
                            }
                            if($_REQUEST['emailset']==1)
                            {
                                echo"<li>IFSC CODE should be valid, It needs to be verified</li>";
                            }
                            if($_REQUEST['pwdset']==1)
                            {
                                echo"<li>Password cannot be left blank or contain special character</li>";
                            }
                            if($_REQUEST['unameset']==1)
                            {
                                echo"<li>Login ID cannot contain blank or special character</li>";
                            } ?>
                       </ul></div> <?php }
        if($error==2)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Password Mismatch</h1></div>";
        if($error==3)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Login Id / Account No. Already Exist</h1></div>";
       if($error==4)
                echo"<div class=\"mainbox\" style=\"width:450px;\"><h1 style=\"font-size: 30px;\">Cannot verify this Email-Id</h1></div>";
        ?>
        
        <?php if($_REQUEST['success']==1) { ?> <div class="logmainbox" style="width: 480px;"><h1>Registered Successfully</h1></div> <?php } ?>
                    
        
    <div class="logmainbox" style="width: 480px;">
        <form action="RegDB.php" method="POST">
            <h1>Sign Up Form</h1>
            <div class="inset">
                <table>
                    <tr>
                        <td><label for="Fname" class="Ltext">First Name</label></td>
                        <td>
                            <input type="text" name="Fname" id="Fname" class="loginput"<?php if (($_REQUEST["fnameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Fname"]."\""; ?> >
                                       
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Lname" class="Ltext">Last Name</label></td>
                        <td><input type="text" name="Lname" id="Lname" class="loginput"<?php if (($_REQUEST["lnameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Lname"]."\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label class="Ltext">Gender</label></td> 
                        <td> <div style="display:inline;color:#666;padding: 0px; margin: 0px;"><input type="radio" name="Gender" value="M"<?php if(!$_REQUEST['gen']) { echo"checked=\"checked\""; } if($_REQUEST['gen']=='M') { echo"checked=\"checked\""; } ?> >Male&nbsp;&nbsp;&nbsp;</div>
                             <div style="display:inline;color:#666;padding: 0px; margin: 0px;"><input type="radio" name="Gender" value="F"<?php if($_REQUEST['gen']=='F') { echo"checked=\"checked\""; } ?> >Female&nbsp;&nbsp;&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="Ltext">Location</label></td>
                        <td>
                            <select name="Day" class="ddlist">
                                <?php $day = array("India","USA","England");
                                for ($i=0;$i<3;$i++)
                                {   echo"<option"; if($_REQUEST['day']==$i) {echo" selected=\"selected\"";} echo">".$day[$i]."</option>"; } ?>
                            </select>
                            <select name="Month" class="ddlist">
                                <?php  $month = array("KERELA","WEST BENGAL","KARNATAKA","MICHIGAN","EDGEBASTON");
                                        for($i=0;$i<5;$i++)
                                        {echo"<option value=\"".$month[$i]."\""; if ($_REQUEST['month']==$i) {echo" selected=\"selected\"";} echo">".$month[$i]."</option>";} ?>
                            </select>
                            <select name="Year" class="ddlist">
                                <?php $year = array("Gotham","Kolkata","New York","Chicago","London");
                                for($i=0;$i<5;$i++)
                                {echo"<option value=\"".$year[$i]."\""; if($_REQUEST['year']==$i) {echo" selected=\"selected\"";} echo">".$year[$i]."</option>"; } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Email" class="Ltext">IFSC CODE</label></td>
                        <td><select name="Email" id="Email" class="ddlist">
                        <?php $re = mysql_query("SELECT * FROM branch");
                           while ($a=  mysql_fetch_array($re))
                           {
                                echo "<option value='$a[ifsccode]'>$a[ifsccode]</option>";
                           }?>
                    
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="Mnum" class="Ltext">Account Number</label></td>
                        <td><input type="text" name="Mnum" id="Mnum" class="loginput"<?php if (($_REQUEST["mnumset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Mnum"]."\""; ?> ></td>
                    </tr>
                    <tr>
                        <td><label for="accstatus" class="Ltext">Account Status</label></td>
                        <td><select name="accstatus" id="accstatus" class="ddlist">
                        <option value="active">Active</option>
                        <option value="inactive">In-active</option>
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="acctype" class="LText">Account Type</label></td>
                        <td><select name="acctype" id="acctype" class="ddlist">
                        <?php $re = mysql_query("SELECT * FROM accountmaster");
                           while ($a=  mysql_fetch_array($re))
                           {
                                echo "<option value='$a[accounttype]'>$a[accounttype]</option>";
                           }?>
                    
                </select></td>
                    </tr>
                    <tr>
                        <td><label for="Uname" class="Ltext">Login ID</label></td>
                        <td><input type="text" name="Uname" class="loginput" id="Uname"<?php if (($_REQUEST["unameset"]==1)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\"";
                                        else echo " value=\"".$_REQUEST["Uname"]."\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Password" class="Ltext">Password</label></td>
                        <td><input type="password" name="Pwd" id="Password" class="loginput"<?php if ((($_REQUEST["pwdset"]==1))||($error==2)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Cpassword" class="Ltext">Re-enter Password</label></td>
                        <td><input type="password" name="Cpwd" id="Cpassword" class="loginput"<?php if ($error==2) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; ?> ></td>
                    </tr>
                    <tr>
                        <td><label for="TrPassword" class="Ltext">Transaction Password</label></td>
                        <td><input type="password" name="TrPwd" id="TrPassword" class="loginput"<?php if ((($_REQUEST["pwdset"]==1))||($error==2)) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; ?> >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="TrCpassword" class="Ltext">Re-enter Password</label></td>
                        <td><input type="password" name="TrCpwd" id="TrCpassword" class="loginput"<?php if ($error==2) echo " style=\"border:thin solid red; box-shadow:1px 1px 4px 2px #F00;\""; ?> ></td>
                    </tr>
                </table>
            </div>
                    <input type="submit" value="Register" style="margin-bottom:25px;margin-right: 25px;" class="loginput">
        </form>
    </div>
    </div>
<?php include'footer.php' ?>
</body>
</html>
