
<?php 
$query = "SELECT max(id_karyawan) as maxKode FROM tbl_karyawan";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang, 2,3);
$noUrut++;
$char = "00";
$newID = $char . sprintf("%03s", $noUrut);

if(isset($_POST['masuk'])) {

$query_cek=mysql_query("SELECT pin FROM tbl_karyawan WHERE pin ='".$_POST['pin']."'"); 
$data=mysql_fetch_array($query_cek);
$cek=mysql_num_rows($query_cek); 
if($cek >0 ) { 
echo"<script>alert('PIN ".$_POST['pin']." sudah ada yang memiliki !')</script>"; 
} else 
{ $result=mysql_query("INSERT INTO tbl_karyawan (pin,nama,dept,jabatan,cabang) VALUES ('".$_POST['pin']."','".$_POST['nama']."','".$_POST['dept']."','".$_POST['jabatan']."','".$_SESSION['SES_CABANG']."')"); 
if($result==true) {
 echo" <div class='alert alert-success'>Berhasil tersimpan</div>"; 
} else { echo" ERROR BRO ".mysql_error().""; 
} 
} 
} 
?>

<body>
   <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"> Form Karyawan</h3>
</div>
  <div class="panel-body">
<form id="form1" name="form1" method="post" action="">
  <table width="360" border="0" cellpadding="4" class="table">
    
    <tr>
      <td width="139"> Pin</td>
      <td width="199">
        <input name="pin" type="text" id="pin"  class="form-control"/>
      </td>
      <td width="199">&nbsp;</td>
      </tr>
    <tr>
      <td>Nama</td>
      <td><input name="nama"class="form-control" type="text" id="nama" required/></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Departemen</td>
      <td>
        <select name="dept" id="dept" required class="form-control">
          <option value="">Pilih</option>
          <option value="ADM">ADM</option>
          <option value="ADM &amp; GA">ADM &amp; GA</option>
          <option value="AFTERSALES">AFTERSALES</option>
          <option value="RENTAL">RENTAL</option>
          <option value="IST DEPT.">IST DEPT.</option>
        </select>
      </td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Jabatan</td>
      <td><select name="jabatan" id="jabatan" required class="form-control">
          <option value="">Pilih</option>
          <option value="ADM">ADM</option>
          <option value="Assistent Mekanik">Assistent Mekanik</option>
          <option value="Office Boy">Office Boy</option>
          <option value="Cleaning Service">Cleaning Service</option>
          <option value="Washer">Washer</option>
          <option value="Salon">Salon</option>
          <option value="Security">Security</option>
          <option value="Driver">Driver</option>
          <option value="Others">Others</option>
          <option value="Programmer">Programmer</option>
      </select></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="masuk" id="masuk" value="SAVE"  class="btn btn-primary"/>
          <input type="reset" name="cancel" id="cancel" value="CANCEL"  class="btn btn-warning"/></td>
      <td>&nbsp;</td>
      </tr>
  </table>

</form>
</div>
</div>
</body>
</html>
