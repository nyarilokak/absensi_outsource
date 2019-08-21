<link rel="stylesheet" href="datepicker/themes/base/jquery.ui.all.css">
	<script src="datepicker/js/jquery-1.7.2.js"></script>
	<script src="datepicker/ui/jquery.ui.core.js"></script>
	<script src="datepicker/ui/jquery.ui.widget.js"></script>
	<script src="datepicker/ui/jquery.ui.datepicker.js"></script>
	
	
    <?php 
	session_start();
	 if (isset($_POST['absen'])) { 
	 if($_POST['keterangan']=="blank")	{
	  echo "<script>alert('Description harus dipilih'); window.location = 'dashboard.php?module=absensi-description'</script>";
	  }
	  else if($_POST['awal']=="") {
	   echo "<script>alert('Tanggal awal harus dipilih'); window.location = 'dashboard.php?module=absensi-description'</script>";
	   }
	  else if ($_POST['akhir']==""){
	   echo "<script>alert('Tanggal sampai harus dipilih'); window.location = 'dashboard.php?module=absensi-description'</script>";
	   }
	  else{
	 $awal = $_POST['awal']; 
	 $akhir =$_POST['akhir']; 
	 $cek=mysql_query("SELECT * FROM tbl_absen WHERE id_karyawan = '".$_SESSION['SES_ID']."' AND tanggal_absen BETWEEN '$awal' AND '$akhir'");
	 if(mysql_num_rows($cek) > 0)	{
	echo" <div class='alert alert-danger'><i class='fa fa-warning'></i> Anda telah melakukan  absen</div>"; 
	 }
	 else	{
	 $awal = strtotime($_POST['awal']); 
	 $akhir = strtotime($_POST['akhir']); 
	 $ket = $_POST['keterangan']; $sql = '';
	 while ($awal <= $akhir) { 
	 $sql .= "('".$_SESSION['SES_ID']."','".date('Y-m-d',$awal)."','$ket','Y'),";
	 $awal = strtotime("+1 days", $awal); } $sql = rtrim($sql,','); 
	 $query = mysql_query("INSERT INTO tbl_absen (id_karyawan,tanggal_absen,ket,status_keluar) VALUES $sql ");
	 if ($query == true) { 
	 echo" <div class='alert alert-success'>Proses pengajuan absensi berhasil di input</div>"; 
	 }
	 else { 
	 echo " error " . mysql_error() . ""; 
	 } 
	 }
	 }
	 } 		 
	  ?>
      
      
<form action="" method="post">
<legend><i class="fa fa-arrow-circle-o-right"> </i> Form Absensi Keterangan</legend>
<div class="table-responsive">
<table  width="100%">
  <tr>
    <td width="116"><label>Keterangan Absen</label></td>
    <td width="30">:</td>
    <td width="322"><label><select name="keterangan" id="select" class="form-control" required>
    <option selected value="">Pilih</option>
    <option value="I">Izin</option>
    <option value="S">Sakit</option>
    <option value="C">Cuti</option>
    <option value="MH">Menikah</option>
    <option value="IU">Ibadah Umrah</option>
    <option value="IH">Ibadah Haji</option>
    <option value="MN">Melahirkan</option>
    </select></label>
    </td>
  </tr>
  <tr>
    <td><label>Dari  </label></td>
    <td>:</td>
    <td><label><input type="text" name="awal" id="tgl1" class="form-control" required></label></td>
  </tr>
  <tr>
    <td><label> Sampai </label></td>
    <td>:</td>
    <td><label><input type="text" name="akhir" id="tgl2"class="form-control" required></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="submit" name="absen" class="btn btn-md btn-success"> Proses</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</div>
</form>