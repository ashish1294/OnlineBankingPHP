<?php  require "DB/DB_Connect.php";
       $uname=$_REQUEST["uname"];
       $password=$_REQUEST["password"];
       
       if ((!($uname==  mysql_real_escape_string($uname)))||(!($password==  mysql_real_escape_string($password))))
       {
           header('Location:index.php?error=1');
           exit(0);
       }
       $query1="SELECT * FROM tempusers WHERE  Uname= '$uname' AND Pwd= '$password'";
       $query2="SELECT * FROM users WHERE  Uname= '$uname' AND Pwd= '$password'";
       $qresult1=mysql_query($query1);
       $num_rows1 = mysql_num_rows($qresult1);
       $qresult2=mysql_query($query2);
       $num_rows2 = mysql_num_rows($qresult2);
       
       if (($num_rows1==0)&&($num_rows2==0))
       {header ('Location:index.php?error=1');}
       else if (($num_rows1==1)&&($num_rows2==0))
          header ('Location:index.php?error=3');
       else
       {   $arr=mysql_fetch_array($qresult2);
           $fname=$arr['Fname'];
           $uname=$arr['Uname'];
           session_start();
           $_SESSION['fname']=$fname;
           $_SESSION['user']=$uname;
           session_write_close();
           header('Location:Welcome.php');
       }
       ?>