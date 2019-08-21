    <?php     
    session_start();
    include "inc/koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    $module=$_GET['module'];
    $act=$_GET['act'];
     
     
    if($module=='absensi' AND $act=='masuk' ){
     
    if(isset($_POST['masuk'])){
     
            $absen=mysql_query("SELECT * FROM tbl_absen WHERE tanggal_absen='".$_POST['tgl']."'
           and id_karyawan='".$_SESSION['SES_ID']."'");
            $tgl=mysql_fetch_array($absen);
            if(mysql_num_rows($absen)>0){
              echo "<script>alert('ANDA TELAH MELAKUKAN ABSEN PADA PUKUL $tgl[jam_masuk] WIB'); window.location = 'dashboard.php?module=absensi'</script>";
            }else {
                    $jam=$_POST['jam'];
                    $max = strtotime('08:05:00');
                    $time = strtotime($jam);
                    if($time < $max){
                    mysql_query("insert into tbl_absen set id_karyawan='$_SESSION[SES_ID]',
                                                                                            tanggal_absen=NOW(),
                                                                                            jam_masuk='".$_POST['jam']."',
                                                                                            status_masuk='Y',
                                                                                            status_keluar='N'");
            echo "<script>alert('ANDA BERHASIL MELAKUKAN CHECK IN'); window.location = 'dashboard.php?module=absensi'</script>";
                    }else {
                                   
                                    mysql_query("insert into tbl_absen set id_karyawan='$_SESSION[SES_ID]',
                                                                                            tanggal_absen=NOW(),
                                                                                            jam_masuk='".$_POST['jam']."',
                                                                                            status_masuk='Y',
                                                                                            status_keluar='N',
                                                                                            terlambat='Y'");
                                    echo "<script>alert('ANDA TELAT !   MOHON JANGAN DI ULANGI LAGI '); window.location = 'dashboard.php?module=absensi'</script>";
                            }
                   
            }
     }
           
           
     if(isset($_POST['izin'])){
     //session_start();
            $absen=mysql_query("SELECT * FROM tbl_absen WHERE tanggal_absen='".$_POST['tgl']."'
           and id_karyawan='".$_SESSION['SES_ID']."'");
            $tgl=mysql_fetch_array($absen);
            if(mysql_num_rows($absen)>0){
    echo "<script>alert('ANDA TELAH MELAKUKAN ABSEN PADA PUKUL $tgl[jam_masuk] Wib'); window.location = 'dashboard.php?module=absensi'</script>";
            }else {
                    mysql_query("insert into tbl_absen set id_karyawan='$_SESSION[SES_ID]',
                                                                                            tanggal_absen='$_POST[tgl]',                                                                                    
                                                                                            status_masuk='N',
                                                                                            status_keluar='N',
                                                                                            ket='I'");
                            echo "<script>alert('ANDA BERHASIL ABSEN IZIN'); window.location = 'dashboard.php?module=absensi'</script>";
            }
     }
     
     
     
     if(isset($_POST['sakit'])){
     //session_start();
            $absen=mysql_query("SELECT * FROM tbl_absen WHERE tanggal_absen='".$_POST['tgl']."'
           and id_karyawan='".$_SESSION['SES_ID']."'");
            $tgl=mysql_fetch_array($absen);
            if(mysql_num_rows($absen)>0){
    echo "<script>alert('ANDA TELAH MELAKUKAN ABSEN PADA PUKUL $tgl[jam_masuk] Wib'); window.location = 'dashboard.php?module=absensi'</script>";
            }else {
                    mysql_query("insert into tbl_absen set id_karyawan='$_SESSION[SES_ID]',
                                                                                            tanggal_absen='$_POST[tgl]',
                                                                                            
                                                                                            status_masuk='N',
                                                                                            status_keluar='N',
                                                                                            ket='S'");
                            echo "<script>alert('ANDA BERHASIL ABSEN SAKIT'); window.location = 'dashboard.php?module=absensi'</script>";
            }
     }
     
 
     
     
     
     
     
    if(isset($_POST['keluar'] )){
			$query=mysql_query("SELECT * FROM tbl_absen WHERE id_karyawan='".$_SESSION['SES_ID']."' AND tanggal_absen='".$_POST['tgl']."'");
			$id=mysql_fetch_array($query);
           date_default_timezone_set('Asia/Jakarta');
            $waktu= date ('H:i:s');
            $absen=mysql_query("select * from tbl_absen where status_keluar='Y' and
           id_absensi='".$id['id_absensi']."'");
            $absen2=mysql_query("select * from tbl_absen where ket='I' and
           id_absensi='".$id['id_absensi']."'");
            $absen3=mysql_query("select * from tbl_absen where ket='S' and
           id_absensi='".$id['id_absensi']."'");
		   
	if(mysql_num_rows($query)==""){
        echo "<script>alert('ANDA BELUM MELAKUKAN CHECK IN'); window.location = 'dashboard.php?module=absensi'</script>";
    }	   
    else if(mysql_num_rows($absen)>0){
        echo "<script>alert('ANDA TELAH MELAKUKAN CHECK OUT PADA PUKUL $id[jam_keluar] WIB'); window.location = 'dashboard.php?module=absensi'</script>";
    }else if(mysql_num_rows($absen2)>0){
        echo "<script>alert('ANDA TIDAK BISA MELAKUKAN CHECK OUT'); window.location = 'dashboard.php?module=absensi'</script>";
    }else if(mysql_num_rows($absen3)>0){
        echo "<script>alert('ANDA TIDAK BISA MELAKUKAN CHECK OUT'); window.location = 'dashboard.php?module=absensi'</script>";
    }else {
            mysql_query("UPDATE tbl_absen SET jam_keluar ='".$_POST['jam']."', status_keluar='Y', ket='M' WHERE id_absensi='".$id['id_absensi']."'");
            echo "<script>alert('ANDA BERHASIL MELAKUKAN CHECK OUT'); window.location = 'dashboard.php?module=absensi'</script>";
            }
    }
	
	
     }
    ?>

