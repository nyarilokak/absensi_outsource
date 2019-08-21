<?php


$query=mysql_query("DELETE FROM tbl_karyawan WHERE id_karyawan='".$_GET['ID_Karyawan']."'");
if($query==true)	{
header('location:dashboard.php?module=data-karyawan');
}
else	{
echo "error";
}

?>