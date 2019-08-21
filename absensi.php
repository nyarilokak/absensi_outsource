<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));

date_default_timezone_set('Asia/Jakarta');
 $jam=date("H:i:s");


?>
<?php
$Sql=mysql_query("SELECT * FROM tbl_karyawan WHERE id_karyawan='".$_SESSION['SES_ID']."'");
$cetak=mysql_fetch_array($Sql);
$date=date('Y-m-d');
?>
  <div class="panel panel-default">
<div class="panel-heading">

</div>
  <div class="panel-body">
  <legend><i class="fa fa-file-text-o"></i> Halaman Absensi Karyawan</legend>
<form name="form1" method="post" action="aksi_absensi.php?module=absensi&act=masuk">
<div class="table-responsive">
  <table width="532" border="0" align="center" class="table">
    <tr>
      <td width="111">PIN </td>
      <td width="4">:</td>
      <td width="290">&nbsp;<span class="badge" style="background-color:#00CC99; font-size:16px"><?php echo $cetak['pin'];?></span></td>
      <td width="336">&nbsp;</td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td>&nbsp;<?php echo $cetak['nama'];?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Department</td>
      <td>:</td>
      <td>&nbsp;<?php echo $cetak['dept'];?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td>&nbsp;<?php echo $cetak['jabatan'];?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Tanggal</td>
      <td>:</td>
      <td>&nbsp;<?php echo " <b>".tanggal(date("Y-m-d"))."</b> ";?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Pukul</td>
      <td>:</td>
      <td>
          <body onload="buatjam()"><div id="jam"> </div> </body> 
          <input type="hidden" name="jam" value="<?php echo $jam;?>" class="form-control" readonly="readonly" /> <input type="hidden" name="tgl" value="<?php echo $date;?>" class="form-control" readonly="readonly" />          </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <button type="submit" name="masuk" class="btn btn-success btn-lg pull-left"> <i class=" fa fa-arrow-circle-left"></i> Absen Masuk </button> 
        
         <button type="submit" name="keluar"  class="btn btn-danger btn-lg pull-right">Absen Pulang <i class="fa fa-sign-out"></i></button>  </td>
    </tr>
  </table>
  </div>
</form>
</div>
</div>
<script type="text/javascript">
    
    function buatjam(){
        var date = new Date();
        var j = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        
        j = cek(j);
        m = cek(m);
        s = cek(s);
        
        document.getElementById("jam").innerHTML = j+":"+m+":"+s;
        setTimeout("buatjam()",500);
    }
    
    function cek(x){
if(x < 10){
x = "0"+x;
}
return x;
}
    

    </script>
    
