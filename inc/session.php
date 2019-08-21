<?php
session_start();
error_reporting(0);
if (empty($_SESSION['SES_PIN']) and empty($_SESSION['SES_ID']) and empty($_SESSION['SES_NAMA'])){
  
 header('location:index.php');
  
 die();
}
else{
}
?>