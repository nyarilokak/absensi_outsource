<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
				
          
        <?php if ($_SESSION['SES_FLAG']==1) {
	echo' <li> <a href="dashboard.php"><i class="fa fa-dashboard"></i> Beranda</a> </li>'; 
	echo '<li> <a href="?module=schedule-freeday"><i class="fa fa-arrow-circle-o-right"> </i> Jadwal Libur</a> </li>'; 
	echo '<li> <a href="?module=data-karyawan"><i class="fa fa-arrow-circle-o-right"> </i> Data Karyawan</a> </li>'; 
	echo' <li> <a href="?module=Laporan-perbulan"><i class="fa fa-arrow-circle-o-right"> </i> Laporan Per Bulan</a> </li>'; 
 
	} ?> 
    <?php if ($_SESSION['SES_FLAG']==2) {
	echo '<li> <a href="?module=absensi"><i class="fa fa-dashboard"> </i> Beranda</a></li>
	<li> <a href="?module=absensi-description"> <i class="fa fa-arrow-circle-o-right"> </i> Absensi  </a></li>
	<li> <a href="?module=Laporan-perkaryawan"><i class="fa fa-file-text"> </i> Report</a></li>'; }
	?> 