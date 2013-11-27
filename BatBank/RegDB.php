<?php
require 'dbconnection.php';
error_reporting(0);
if(isset($_SESSION['customerid']))
{
	header("Location: accountalerts.php"); exit(0);
}
if(isset($_SESSION['adminid']))
{
    header("Location: admindashboard.php");
}
$fname=$_REQUEST["Fname"];
$lname=$_REQUEST["Lname"];
$uname=$_REQUEST["Uname"];
$mnum=$_REQUEST["Mnum"];
$email=$_REQUEST["Email"];
$day=$_REQUEST["Day"];
$month=$_REQUEST["Month"];
$year=$_REQUEST["Year"];
$gen=$_REQUEST["Gender"];
$pwd=$_REQUEST["Pwd"];
$cpwd=$_REQUEST["Cpwd"];
$trpwd=$_REQUEST["TrPwd"];
$trcpwd=$_REQUEST["TrCpwd"];
$accstatus=$_REQUEST["accstatus"];
$date= date('Y-m-d');

$Loc='Location:Register.php?';
$flag=0;
{
if ((!($fname))||(substr($fname, 0, 1)==' '))
{ $Loc=$Loc."fnameset=1&"; $flag=1;}
if ((!($lname))||(substr($lname, 0, 1)==' '))
{ $Loc=$Loc."lnameset=1&"; $flag=1; }
if ((!($uname))||(substr($uname, 0, 1)==' ')||(!($uname==mysql_escape_string($uname)))||(!($uname==trim($uname))))
{ $Loc=$Loc."unameset=1&"; $flag=1; }
if ((!($pwd))||(!($pwd==mysql_escape_string($pwd))))
{ $Loc=$Loc."pwdset=1&"; $flag=1; }
if ((!($trpwd))||(!($trpwd==mysql_escape_string($trpwd))))
{ $Loc=$Loc."trpwdset=1&"; $flag=1;}
if ((!($mnum))||(substr($mnum, 0, 1)==' '))
{ $Loc=$Loc."mnumset=1&"; $flag=1;}

}
if ($flag==1)
{
    $month=$month-1;
    header($Loc.'Fname='.$fname.'&Lname='.$lname.'&Email='.$email.'&Uname='.$uname.'&day='.$day.'&month='.$month.'&year='.$year.'&gen='.$gen.'&Mnum='.$mnum.'&error=1');
    exit(0);
}
if ((!($pwd==$cpwd))||(!($trpwd==$trcpwd)))
{   header($Loc.'Fname='.$fname.'&Lname='.$lname.'&Email='.$email.'&Uname='.$uname.'&day='.$day.'&Mnum='.$mnum.'&month='.$month.'&year='.$year.'&gen='.$gen.'&mnum='.$mnum.'&error=2'); exit(0);}
    $query="SELECT * FROM users WHERE  loginid='".$uname."'";
    $qresult=mysql_query($query);
    $num_rows = mysql_num_rows($qresult);
    
    if($num_rows>0)
    {
        header('Location:Register.php?error=3'); exit(0);
    }
    else{
    $query="SELECT * FROM accounts WHERE  accno= '".$mnum."'";
    $qresult=mysql_query($query);
    $num_rows = mysql_num_rows($qresult);
    
    if($num_rows>0)
    {
        header('Location:Register.php?error=3'); exit(0);
    }
    else 
    {
        $sqlquery = "INSERT INTO customers(customerid,ifsccode,firstname,lastname,loginid,accpassword,transpassword,accstatus,city,state,country,accopendate) VALUES('','$email','$fname','$lname','$uname','$pwd','$trpwd','$accstatus','$year','$month','$day','$date')";
        mysql_query($sqlquery) or die("Unable to Register. Please contact Administrator");
        $ree=mysql_query("SELECT * FROM customers WHERE loginid='$uname'");
        $arra=  mysql_fetch_array($ree);
        $cusid=$arra['customerid'];
        $sql="INSERT INTO accounts(accno,customerid,accstatus,accopendate,accounttype,accountbalance) VALUES ('$mnum','$cusid','$accstatus','$date','$_POST[acctype]','1000')";
        mysql_query($sql) or die("Unable to Register. Please contact Administrator");
        header('Location:Register.php?success=1');
        exit(0);
    }
    }


?>