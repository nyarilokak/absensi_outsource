<?php
include"inc/session.php";
include"inc/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <link rel="shortcut icon" href="../trac.ico"type="image/gif/ico">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/menu.css" rel="stylesheet">
<script src="css/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Absensi Karyawan Trac  Palembang</title>
</head>
<style type="text/css">
body{background-color:#EFEFEF;
font-family:Arial;
font-size:14px;
}
.menu a	{color:#FFFFFF;

text-decoration:none;
}
.menu a:hover	{ color:#FFCC66;
}
.table	{
 border:1px solid #efefef;
 }
.style1 {color: #FFFFFF}
</style>

<body>
<table width="1000" border="0" align="center" bgcolor="#FFFFFF" style="padding:5px;"  >
  <tr>
    <td width="695" height="71"><img src="images/logo.jpg" width="160" height="69" /></td>
  </tr>
  <tr>
    <td height="64" ><ul>  <?php if ($_SESSION['SES_FLAG']==1) {
	echo' <li> <a href="dashboard.php"><i class="fa fa-home"></i> Home</a> </li>'; 
	echo '<li> <a href="?module=schedule-freeday">Jadwal Libur</a> </li>'; 
	echo '<li> <a href="?module=data-karyawan">Data Karyawan</a> </li>'; 
	echo' <li> <a href="?module=Laporan-perbulan">Laporan Per Bulan</a> </li>'; 
 
	} ?> 
    <?php if ($_SESSION['SES_FLAG']==2) {
	echo '<li> <a href="?module=absensi">Absence</a>
	</li>
	<li> <a href="?module=Laporan-perkaryawan"> Report</a></li>'; }
	?> 
    <li> <a href="inc/logout.php"> Log Out</a></li></ul></td>
  </tr>
  <tr>
    <td height="185" valign="top">
  <?php
    $p=$_GET["module"];
 
if($p==""){
 
include "home.php";
 
       }else if($p=="add-karyawan"){
 
              include "form_karyawan.php";
 
       }else if($p=="data-karyawan"){
 
              include "data_karyawan.php";
 
       
	   }else if($p=="absensi"){
 
              include "absensi.php";
 
       }else if($p=="schedule-freeday"){
 
              include "data_libur.php";
 
       }
	   else if($p=="absensi-description"){
 
              include "Absen_keterangan.php";
 
       }else if($p=="Update-Karyawan"){
 
              include "Update_karyawan.php";
 
       }else if($p=="create-freeday"){
 
              include "form_libur.php";
 
       } else if($p=="Delete-Karyawan"){
 
              include "Del_Karyawan.php";
 
       } else if($p=="edit-schedule"){
 
              include "update_libur.php";
 
       }else if($p=="Laporan-perbulan"){
 
              include "Report_perbulan.php";
 
       }else if($p=="Laporan-perkaryawan"){
 
              include "Report_perkaryawan.php";
 
       }
	   
	   
 
?></td>
  </tr>
  <tr>
    <td height="28" bgcolor="#2980b9"><div align="center" class="style1"> <small>Copyright  &copy; Trac Palembang 2014 | Absensi Karyawan  </small></div></td>
  </tr>
</table>
</body>
</html>
