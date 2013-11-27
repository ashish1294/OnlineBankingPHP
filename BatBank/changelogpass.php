<?php
session_start();
error_reporting(0);
include("dbconnection.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

if(isset($_POST["button"]))
{
    if (mysql_real_escape_string($_POST[newpass]) == $_POST[newpass])
    {
mysql_query("UPDATE customers SET accpassword='$_POST[newpass]' WHERE customerid='$_SESSION[customerid]' AND accpassword='$_POST[oldpass]'");
	if(mysql_affected_rows() == 1)
	{
	$ctrow = "Password updated successfully..";
	}
	else
	{
	$ctrow = "Failed to update Password";
	}
        }
    else
        $ctrow = "Invalid New Password";
}
?>
<html>
<head>
<link href="images/favicon.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Bank of Gotham City</title>
<link href="css/LoginPageStyle.css" rel="stylesheet" type="text/css" />
<script>
function validateForm()
{
var x=document.forms["form1"]["loginid"].value;
var y=document.forms["form1"]["oldpass"].value;
var z=document.forms["form1"]["newpass"].value;
var a=document.forms["form1"]["confpass"].value;
if (x==null || x=="")
  {
  alert("Login id must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Old password must be entered");
  return false;
  }
  if (z==null || z=="")
  {
  alert("Enter the new password");
  return false;
  }
  if (a==null || a=="")
  {
  alert("Password must be confirmed");
  return false;
  }
  if(!(z==a))
      {
          alert("Password Mismatch");
          return false;
      }
}
</script>

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
<div  id="toptabmenu">
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
        <h2>Change Login password</h2>

        	<form onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
                    <table width="606" height="314" border="0">
                        <tr>
                            <th colspan="2" scope="row">&nbsp;   <?php echo $ctrow; ?>	</th>
                        </tr>
        	    
                        <tr>
                            <th width="289" height="46" scope="row">LOGIN ID</th>
                            <td width="210"><input name="loginid" type="text" id="loginid" size="35" readonly="readonly" value="<?php echo $_SESSION[customerid]; ?>"/></td>
                        </tr>
                        
                        <tr>
                            <th height="42" scope="row">OLD PASSWORD</th>
                            <td><input name="oldpass" type="password" id="oldpass" size="35" /></td>
                        </tr>
                        
                        <tr>
                            <th height="47" scope="row">NEW PASSWORD</th>
                            <td><input name="newpass" type="password" id="newpass" size="35" /></td>
                        </tr>
                            
                        <tr>
                            <th height="46" scope="row">CONFIRM PASSWORD</th>
                            <td><input name="confpass" type="password" id="confpass" size="35" /></td>
                        </tr>
        	    
                        <tr>
                            <th scope="row">&nbsp;</th> <td>&nbsp;</td>
                        </tr>
        	    
                        <tr>
                            <th height="60" scope="row">&nbsp;</th>
                            <td><input type="submit" name="button" id="button" value="UPDATE PASSWORD" /></td>
                        </tr>
                </table>
          </form>
    </div>
    
    <div id="sidebar">
        <h2>Personalise</h2>
                
                <ul>
                <li><a href="changelogpass.php">Change Login Password</a></li>
                <li><a href="changetranspass.php">Change Transaction Password</a></li>
                <li><a href="custprofile.php">Customer Profile</a></li>
                </ul>
    </div>
</div>


<?php include'footer.php' ?>
    </div>
</body>
</html>
