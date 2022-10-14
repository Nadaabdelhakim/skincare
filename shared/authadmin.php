<?php
session_start();
if(isset($_SESSION['adminemail'])){

}else{
    header('location:../sign/signin.php');
}

?>