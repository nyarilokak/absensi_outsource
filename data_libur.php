
<legend><h3>Schedule Libur Kerja</h3></legend>
<div class="table-responsive">

<table id="example" align="center" class="table table-striped">
  <thead>
  <tr>
    <td colspan="2"></td>
    <td>&nbsp;</td>
    <td><a href="?module=create-freeday"class="btn btn-info pull-right"><i class="icon icon-plus"></i>Tambah Schedule <i class="fa fa-plus-circle"></i></a></td>
  </tr>
  <tr>
    <td width="68" height="24" bgcolor="#EFEFEF"><strong>No </strong></td>
    <td width="76" bgcolor="#EFEFEF"><strong>Tanggal</strong></td>
    <td width="242" bgcolor="#EFEFEF"><strong>Keterangan Libur</strong></td>
    <td width="103" bgcolor="#EFEFEF"><strong>Aksi</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php
 

  $sql=mysql_query("SELECT * FROM tbl_libur ORDER BY id DESC");
 
  $no= 1;
  while($data=mysql_fetch_array($sql)) {
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><span class="label label-primary" style="font-size:14px;"><?php echo tanggal($data['tanggal']);?></span></td>
    <td><?php echo $data['description'];?></td>
    <td><a href="?module=edit-schedule&id=<?php echo $data['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i>  </a>  </td>
  </tr>
  <?php $no++; } ?>
  </tbody>
</table>
</div>
