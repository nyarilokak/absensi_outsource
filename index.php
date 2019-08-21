<?php 
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <link rel="shortcut icon" href="../trac.ico"type="image/gif/ico">
<link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Absensi Karyawan</title>
<style type="text/css">
body {
background-color:#fff;
padding-top:40px;
}

</style>
</head>
<script type="text/javascript"> 
function angka(e) { if (!/^[0-9]+$/.test(e.value))
 { e.value = e.value.substring(0,e.value.length-1); } } 
 </script>
  <button class="btn btn-lg btn-warning" onClick="windowClose()"><i class="fa fa-arrow-circle-left"></i> Close</button>
 <body>
 <div class="container">

 <div class="row">
 <div class="col-lg-4">
 </div>
 <div class="col-lg-4">
 <?php
include "inc/koneksi.php";
if(isset($_POST['masuk']))	{
$pin = abs($_POST['pin']);


// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM tbl_karyawan WHERE pin='$pin'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['SES_ID']     = $r['id_karyawan'];
  $_SESSION['SES_PIN']     = $r['pin'];
  $_SESSION['SES_NAMA']    = $r['nama'];
  $_SESSION['SES_FLAG']    = $r['flag'];
  
 header('location:dashboard.php?module=absensi');
}
else{
echo"<div class='alert alert-danger'><center> PIN yang anda masukan salah! <span class='close' data-dismiss='alert'>&times;</span></center></div>";
}
}
?>

 <div class="panel panel-primary" style="box-shadow:0px 0px 3px #ccc;">
 <div class="panel-heading">
 <h1 class="panel-title">Aplikasi Absensi Karyawan </h1>
 </div>
 <div class="panel-body">



	
	
	
      <form id="form1" name="form1" method="post" action="">
      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
 
        <input name="pin" type="password" id="pin"   class="form-control input-lg"size="15" placeholder=" Masukan PIN " onkeyup="angka(this);" required  data-toggle="tooltip" data-original-title="Silahkan masukan nomor PIN anda"/></div>
       
        <button type="submit" name="masuk"  class="btn btn-primary btn-lg btn-block"/><b> Masuk <i class="fa  fa-sign-in"></i></b></button>
    
</form>
</div>
</div>
</div>
<div class="col-lg-4">

</div>
</div>
</div>

</body>
 <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'bottom'
    });
});
</script>

<script language="javascript" type="text/javascript">
function windowClose() {
window.close();
}
</script>
</html>
