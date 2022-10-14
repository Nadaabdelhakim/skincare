<?php
session_start();

if(isset($_SESSION['useremail'])||isset($_SESSION['adminemail'])){
   if(isset($_SESSION['useremail'])){
       $email=$_SESSION['useremail'];
       $select="SELECT `userid` FROM `user` WHERE `useremail`= '$email'";
       $runselect=mysqli_query($conn, $select);
       $fetchuserid=mysqli_fetch_array($runselect);
       $userid=$fetchuserid['userid'];
       
   }else{
    $adminemail=$_SESSION['adminemail'];
    $selectt="SELECT `adminid` FROM `admin` WHERE `adminemail`= '$adminemail'";
    $runselectt=mysqli_query($conn, $selectt);
    $fetchadminid=mysqli_fetch_array($runselectt);
    $adminid=$fetchadminid['adminid'];
    
   }
}else{
    header('location:/tedx/skincare/home.php');
    
}

?>