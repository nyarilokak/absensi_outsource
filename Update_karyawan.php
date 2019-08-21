
<?php
$sql=mysql_query("SELECT * FROM tbl_karyawan WHERE id_karyawan='".abs($_GET['ID_Karyawan'])."'");
$row=mysql_fetch_assoc($sql);

if(isset($_POST['masuk'])) {
 
 $result=mysql_query("UPDATE  tbl_karyawan SET status='".$_POST['status']."',nama='".$_POST['nama']."',dept='".$_POST['dept']."',jabatan='".$_POST['jabatan']."' WHERE id_karyawan='".abs($_GET['ID_Karyawan'])."'"); 
if($result==true) {
 echo"<div class='alert alert-success'>Data karyawan berhasil diupdate</div>"; 
} else { 
echo" ERROR BRO ".mysql_error().""; 

} 
} 
?>

<body>
   <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"> Update Karyawan</h3>
</div>
  <div class="panel-body">
<form id="form1" name="form1" method="post" action="">
  <table width="360" border="0" cellpadding="4" class="table">
    
    <tr>
      <td width="139"> Pin</td>
      <td width="199"><label>
        <input name="pin" type="text" id="pin" size="0" value="<?php echo $row['pin'];?>"readonly="readonly" class="form-control"/>
      </label></td>
      <td width="199">&nbsp;</td>
      </tr>
    <tr>
      <td>Nama</td>
      <td><input name="nama" type="text" id="nama" value="<?php echo $row['nama'];?>" class="form-control"/></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Departemen</td>
      <td>
      <select name="dept" id="dept" required class="form-control">
      <?php $gender = $row['dept']; ?> 
        <option value="">Pilih</option>
        <option value="ADM"<?php echo $gender=='ADM' ? ' selected' : ''; ?> >ADM</option>
        <option value="ADM &amp; GA"<?php echo $gender=='ADM &amp; GA' ? ' selected' : ''; ?> >ADM &amp; GA</option>
        <option value="AFTERSALES"<?php echo $gender=='AFTERSALES' ? ' selected' : ''; ?> >AFTERSALES</option>
        <option value="RENTAL"<?php echo $gender=='RENTAL' ? ' selected' : ''; ?> >RENTAL</option>
        <option value="IST DEPT."<?php echo $gender=='IST DEPT.' ? ' selected' : ''; ?> >IST DEPT.</option>
      </select>
      </td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Jabatan</td>
      <td><select name="jabatan" id="jabatan" class="form-control" required>
       <?php $gender = $row['jabatan']; ?> 
        <option value="">Pilih</option>
        <option value="ADM" <?php echo $gender=='ADM' ? ' selected' : ''; ?> >ADM</option>
        <option value="Assistent Mekanik"<?php echo $gender=='Assistent Mekanik' ? ' selected' : ''; ?> >Assistent Mekanik</option>
        <option value="Office Boy"<?php echo $gender=='Office Boy' ? ' selected' : ''; ?> >Office Boy</option>
        <option value="Cleaning Service"<?php echo $gender=='Cleaning Service' ? ' selected' : ''; ?> >Cleaning Service</option>
        <option value="Washer"<?php echo $gender=='Washer' ? ' selected' : ''; ?> >Washer</option>
        <option value="Salon"<?php echo $gender=='Salon' ? ' selected' : ''; ?> >Salon</option>
        <option value="Security"<?php echo $gender=='Security' ? ' selected' : ''; ?> >Security</option>
        <option value="Driver"<?php echo $gender=='Driver' ? ' selected' : ''; ?> >Driver</option>
        <option value="Others"<?php echo $gender=='Others' ? ' selected' : ''; ?> >Others</option>
        <option value="Programmer"<?php echo $gender=='Programmer' ? ' selected' : ''; ?> >Programmer</option>
      </select></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Status Kerja</td>
      <td><label class="radio-inline">
     <?php $gender = $row['status']; ?> 
    <input name="status" type="radio"  <?php echo $disabled; ?> value="1"  <?php echo $gender=='1' ? ' checked' : ''; ?> />  <small> Aktif </small></label>
     <label class="radio-inline"><input <?php echo $disabled; ?> name="status" type="radio" value="0"  <?php echo $gender=='0' ? ' checked' : ''; ?> />  <small> Resign  </small></label></td>
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
