<?php 
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Aplikasi</title>
<style type="text/css">
body {
padding-top:40px;
}
.login { border:0;
padding:10px;
background-color:transparent;

border-radius:5px;}
#masuk	{background-color:#003366;
border:0;
padding:4px;
color:white;
cursor:pointer;
font-weight:bold;}
.luar 	{background-image:url(images/background.jpg);
background-repeat:no-repeat;
background-size: 100%;
border-radius:5px;}
.style1 {color: #FFFFFF}
</style>
</head>
<script type="text/javascript"> 
function angka(e) { if (!/^[0-9]+$/.test(e.value))
 { e.value = e.value.substring(0,e.value.length-1); } } 
 </script>

<body>
 <div class="container">
 
 <div class="row">
 <div class="col-lg-4">
 </div>
 <div class="col-lg-4">
    <?php
include "inc/koneksi.php";
if(isset($_POST['masuk']))	{
$pin = $_POST['pin'];
$pwd = mysql_real_escape_string(md5($_POST['password']));


// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM admin WHERE username='$pin' AND password='$pwd'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['SES_ID']     = $r['id_karyawan'];
  $_SESSION['SES_PIN']     = $r['pin'];
  $_SESSION['SES_NAMA']    = $r['nama'];
  $_SESSION['SES_FLAG']    = $r['flag'];
$_SESSION['SES_CABANG']    = $r['cabang'];
  
 header('location:dashboard.php');
}
else{
echo"<div class='alert alert-danger'><center>Username atau password salah<span class='close' data-dismiss='alert'>&times;</span></center></div>";
}
}
?>

 <div class="panel panel-success" style="box-shadow:0px 0px 3px #ccc;">
 <div class="panel-heading">
 <h1 class="panel-title">Administrator  </h1>
 </div>
 <div class="panel-body">


    <form id="form1" name="form1" method="post" action="">
   <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input name="pin" type="text" id="pin"  size="20"  required onfocus class="form-control" placeholder="Username"/>
        </div>
         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
      
     <input name="password" type="password" id="pin2"  size="20"   required="required" onfocus="onfocus"/ class="form-control" placeholder="Password">
     </div>
          <input type="submit" name="masuk"value="Login"  class="btn btn-success btn-block btn-md"/> 
          
          
    </form>
    
    
    </div>
</div>
</div>
<div class="col-lg-4">

</div>
</div>
</div>
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
</body>
</html>
