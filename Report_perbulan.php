<head>
 <link rel="stylesheet" href="choosen/chosen.css">
 <style type="text/css">
 .ming	{background-color:#e74c3c;
 color:white;
 font-weight:bold;
 }
 </style>
 </head>
 
 <?php
 
 ?>
 <legend> Laporan Periode Absen Karyawan </legend>
<form action="Print_absensi.php" method="post" target="_blank">
<div class="table-responsive">
  <table width="782" border="0">
    <tr>
      <td><label>Nama Karyawan / PIN</label> </td>
      <td colspan="3"><select name="pin"class="chosen-select form-control" required >
        <option  value=""> Pilih</option>
        <?php
	  $sql=mysql_query("SELECT id_karyawan,nama,pin,status,cabang FROM tbl_karyawan  WHERE status='1' AND cabang='".$_SESSION['SES_CABANG']."' ORDER BY nama ASC");
	  while($data=mysql_fetch_array($sql)) {
	  echo"<option value='$data[pin]'> $data[nama] | $data[pin]</option>";	  
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label>Periode Absen</label></td>
      <td>Dari 
      <input type="text" class="form-control" id="tgl1"  name="awal" required/></td>
      <td>&nbsp;</td>
      <td>Sampai 
      <input type="text" class="form-control" id="tgl2"  name="sampai" required/></td>
    </tr>
    <tr>
      <td><label></label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="249"><label></label></td>
      <td width="255">&nbsp;</td>
      <td width="12">&nbsp;</td>
      <td width="248">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" name="tampilkan" id="button" class="btn btn-primary btn-md btn-block" /> <i class="fa fa-search"></i> Tampilkan </button></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
<?PHP
if(isset($_POST['tampilkan']))  {
$SQL=mysql_query("SELECT A.id_absensi, A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND MONTH(tanggal_absen)='".$_POST['bulan']."' AND YEAR(tanggal_absen)='".$_POST['tahun']."' AND pin='".$_POST['nama']."' ORDER BY id_absensi ASC");
 
if(mysql_num_rows($SQL) >0 )    {
$cetak=mysql_fetch_array($SQL);
$tgl = $cetak['tanggal_absen'];
$exp = explode('-',$tgl);
 
$absensi = array();
$SQL2=mysql_query("SELECT A.id_absensi,A.tanggal_absen,A.jam_masuk,A.jam_keluar,A.ket,A.terlambat,B.id_karyawan,B.nama,B.dept,B.jabatan FROM tbl_absen A,tbl_karyawan B WHERE A.id_karyawan=B.id_karyawan AND MONTH(tanggal_absen)='".$_POST['bulan']."' AND YEAR(tanggal_absen)='".$_POST['tahun']."' AND pin='".$_POST['nama']."' ORDER BY tanggal_absen ASC");
while($data = mysql_fetch_array($SQL2)){
  $absensi[$data['tanggal_absen']] = $data;
}
 
$libur = array();
$SQL3=mysql_query("SELECT * FROM tbl_libur WHERE MONTH(tanggal)='".$_POST['bulan']."' AND YEAR(tanggal)='".$_POST['tahun']."'");
while($data = mysql_fetch_array($SQL3)){
$libur[$data['tanggal']] = $data['description'];
}

echo'<br>
<div class="panel panel-info">
<div class="panel-heading">
<center> <h3 class="panel-title"> Laporan Absensi Karyawan Outsource Perbulan</h3></center>
</div>
<div class="panel-body">
 
<table width="461" border="0" align="center" style="padding:10px;">
<tr>
  <td width="159">Nama Karyawan</td>
  <td width="12">:</td>
  <td width="276"> '.$cetak['nama'].'</td>
</tr>
<tr>
  <td>Department</td>
  <td>:</td>
  <td>'.$cetak['dept'].'</td>
</tr>
<tr>
  <td>Jabatan</td>
  <td>:</td>
  <td>'.$cetak['jabatan'].'</td>
</tr>
<tr>
  <td>Bulan </td>
  <td>:</td>
  <td>'.bulan($exp[1]).'</td>
</tr>
<tr>
  <td>Tahun</td>
  <td>:</td>
  <td>'.$_POST['tahun'].'</td>
</tr>
</table>
';
echo'<a href="Print_absensi.php?year='.$_POST['tahun'].'&month='.$_POST['bulan'].'&pin='.$_POST['nama'].'" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print Preview</a>';
echo'
<br>
<table class="table">
<tr style="font-weight:bold">
 
  <td>Tanggal</td>
  <td>Jam Masuk</td>
  <td>Jam Keluar</td>
  <td>Keterangan</td>
  <td> Terlambat </td>
  <td> Jam  Kerja</td>
</tr>';
  $ym = $_POST['tahun'].'-'.$_POST['bulan'];
  $date1 = $ym.'-01';
  $date2 = ($ym==date('Y-m')) ? date('Y-m-d') : $ym.date('-t',strtotime($ym));
 
 
  while(strtotime($date1) <= strtotime($date2)){
    if(array_key_exists($date1, $absensi)){
      $jam_masuk = $absensi[$date1]['jam_masuk'];
      $jam_keluar = $absensi[$date1]['jam_keluar'];
      $ket = keterangan($absensi[$date1]['ket']);
      $terlambat = $absensi[$date1]['terlambat'];
    }
    else{
      $jam_masuk = '<font color=red>00:00:00</font>';
      $jam_keluar = '<font color=red>00:00:00</font>';
  if(array_key_exists($date1,$libur)) $ket = $libur[$date1];
else if(date('w',strtotime($date1))==0) $ket = '<font color=red>Minggu</font>';
else $ket = '<font color=red>Alpha</font>';
      $terlambat = '';
    }
     echo'<tr>
           <td> '.date('d',strtotime($date1)). '</td>
           <td> '.$jam_masuk.' </td>
           <td> '.$jam_keluar.' </td>
           <td> '.$ket.' </td>
           <td> '.hadir($terlambat).' </td>
           <td> <center>'.selisih($jam_masuk,$jam_keluar). '</center></td>
         </tr>';
    $date1 = date('Y-m-d',strtotime($date1.'+1 days'));
   
  }
  unset($absensi);
  /*while($data=mysql_fetch_assoc($SQL2)) {
 
  $tanggal=explode('-',''.$data['tanggal_absen'].'');
 
   
   echo'<tr>
 
   <td> '.$tanggal[2]. '</td>
   <td> '.$data['jam_masuk'].' </td>
   <td> '.$data['jam_keluar'].' </td>
   <td> '.keterangan($data['ket']).' </td>
   <td> '.hadir($data['terlambat']).' </td>
   <td> <center>'.selisih($data['jam_masuk'],$data['jam_keluar']). '</center></td>
 </tr>';
 
   $no++; }*/
echo'</table> </div></div>';
?>

<?php }  else   {
 
echo" <br><div class='alert alert-danger'><i class='fa fa-warning'></i> Belum ada data untuk ditampilkan</div>";
 
}
}
?>
 


<script src="choosen/chosen.jquery.js" type="text/javascript"></script>

<script type="text/javascript">
  
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  
	<script src="datepicker/js/jquery-1.7.2.js"></script>
	<script src="datepicker/ui/jquery.ui.core.js"></script>
	<script src="datepicker/ui/jquery.ui.widget.js"></script>
	
	
   