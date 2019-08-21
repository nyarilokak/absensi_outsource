<link rel="stylesheet" href="datepicker/themes/base/jquery.ui.all.css">
	<script src="datepicker/js/jquery-1.7.2.js"></script>
	<script src="datepicker/ui/jquery.ui.core.js"></script>
	<script src="datepicker/ui/jquery.ui.widget.js"></script>
	<script src="datepicker/ui/jquery.ui.datepicker.js"></script>
	
   
<?php
$sql=mysql_query("SELECT * FROM tbl_libur WHERE id='".abs($_GET['id'])."'");
$row=mysql_fetch_assoc($sql);

if(isset($_POST['masuk'])) {
 
 $result=mysql_query("UPDATE  tbl_libur SET tanggal='".$_POST['tanggal']."',description='".$_POST['keterangan']."' WHERE id='".abs($_GET['id'])."'"); 
if($result==true) {
 echo"<div class='alert alert-success'>Berhasil diperbaharui</div>"; 
} else { 
echo" ERROR BRO ".mysql_error().""; 

} 
} 
?>

<body>
   <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title">Update Jadwal Libur</h3>
</div>
  <div class="panel-body">
<form id="form1" name="form1" method="post" action="">
  <table width="360" border="0" cellpadding="4" class="table">
    
    <tr>
      <td width="139"> Tanggal</td>
      <td width="199"><label>
        <input name="tanggal" type="text" id="tgl1" size="0" value="<?php echo $row['tanggal'];?>"class="form-control"/>
      </label></td>
      </tr>
    <tr>
      <td>Keterangan</td>
      <td><textarea name="keterangan" cols="30" rows="4" id="nama" class="form-control"><?php echo $row['description'];?></textarea></td>
      </tr>
    
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="masuk" id="masuk" value="SAVE"  class="btn btn-primary"/>
          <input type="reset" name="cancel" id="cancel" value="CANCEL"  class="btn btn-warning"/></td>
      </tr>
  </table>
 
</form>
</div>
</div>
</body>
</html>
