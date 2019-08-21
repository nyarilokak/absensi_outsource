
<legend><h3>Data Karyawan</h3></legend>
<div class="table-responsive">

<table  align="center"  id="example"class="table table-striped">
  <thead>
  <tr>
    <td colspan="2"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="?module=add-karyawan"class="btn btn-primary pull-right"><i class="icon icon-plus"></i>Tambah Karyawan <i class="fa fa-plus-circle"></i></a></td>
  </tr>
  <tr>
    <td width="68" height="24" bgcolor="#EFEFEF"><strong>No </strong></td>
    <td width="76" bgcolor="#EFEFEF"><strong>PIN</strong></td>
    <td width="242" bgcolor="#EFEFEF"><strong>Nama Karyawan</strong></td>
    <td width="129" bgcolor="#EFEFEF"><strong>Departemen</strong></td>
    <td width="82" bgcolor="#EFEFEF"><strong>Jabatan</strong></td>
     <td width="82" bgcolor="#EFEFEF"><strong>Status Kerja</strong></td>
    <td width="103" bgcolor="#EFEFEF"><strong>Aksi</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $no=1;

  $sql=mysql_query("SELECT * FROM tbl_karyawan  WHERE cabang='".$_SESSION['SES_CABANG']."' ORDER BY id_karyawan ASC ");

  while($data=mysql_fetch_array($sql)) {
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><span class="label label-primary" style="font-size:14px;"><?php echo $data['pin'];?></span></td>
    <td><?php echo $data['nama'];?></td>
    <td><?php echo $data['dept'];
?></td>
    <td><?php echo $data['jabatan'];?></td>
     <td><center><?php echo status($data['status']);?></center></td>
 
    <td><a href="?module=Update-Karyawan&ID_Karyawan=<?php echo $data['id_karyawan'];?>" class="btn btn-warning"><i class="fa fa-edit"></i>  </a>  <!--<a href="?module=Delete-Karyawan&ID_Karyawan=<?php echo $data['id_karyawan'];?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a> --></td>
  </tr>
  <?php $no++; } ?>
  </tbody>
</table>
</div>