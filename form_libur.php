<link rel="stylesheet" href="datepicker/themes/base/jquery.ui.all.css">
	<script src="datepicker/js/jquery-1.7.2.js"></script>
	<script src="datepicker/ui/jquery.ui.core.js"></script>
	<script src="datepicker/ui/jquery.ui.widget.js"></script>
	<script src="datepicker/ui/jquery.ui.datepicker.js"></script>
	
   
<?php 

if(isset($_POST['masuk'])) {

$result=mysql_query("INSERT  INTO tbl_libur (tanggal,description) VALUES ('".$_POST['pin']."','".$_POST['keterangan']."')"); 
if($result==true) {
 echo" <div class='alert alert-success'>Berhasil tersimpan</div>"; 
} else { echo" ERROR BRO ".mysql_error().""; 
} 
 
} 
?>

<body>
   <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"> Jadwal Hari Libur</h3>
</div>
  <div class="panel-body">
<form id="form1" name="form1" method="post" action="">
  <table width="493" border="0" cellpadding="4" class="table">
    
    <tr>
      <td width="141">Tanggal Libur</td>
      <td width="330"><label>
        <input name="pin" type="text" id="tgl1" size="0" required class="form-control"/>
      </label></td>
      </tr>
    <tr>
      <td>Keterangan Libur</td>
      <td><textarea name="keterangan" cols="30" rows="4" id="nama"required class="form-control"></textarea></td>
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
