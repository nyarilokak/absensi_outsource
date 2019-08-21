<?php
$media='http://'.$_SERVER['HTTP_HOST'].'/trac/absen';
$index='http://'.$_SERVER['HTTP_HOST'].'/inilahsumsel';
include('inc/koneksi.php');
include('inc/session.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Absensi Karyawan</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $media;?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo $media;?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="<?php echo $media;?>/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
 <link rel="stylesheet" media="screen" href="<?php echo $media;?>/css/datepicker.fixes.css">
     <!-- TABLE STYLES-->
    <link href="<?php echo $media;?>/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <link rel="stylesheet" media="screen" href="<?php echo $media;?>/bootstrap-datepicker/css/datepicker.css">
       <script type="text/javascript" src="<?php echo $media;?>/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ABSENSI <small style="font-size:12px">Version 0.2</small></a> 
            </div>
            <div style="color:white;">
            
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="inc/logout.php" class="btn btn-warning square-btn-adjust"> <i class="fa fa-power-off"></i> Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<?php include('sidebarmenu.php');?>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                   <?php
    $p=$_GET["module"];
 
if($p==""){
 
include "home.php";
 
       }else if($p=="add-karyawan"){
 
              include "form_karyawan.php";
 
       }else if($p=="data-karyawan"){
 
              include "data_karyawan.php";
 
       
	   }else if($p=="absensi"){
 
              include "absensi.php";
 
       }else if($p=="schedule-freeday"){
 
              include "data_libur.php";
 
       }
	   else if($p=="absensi-description"){
 
              include "Absen_keterangan.php";
 
       }else if($p=="Update-Karyawan"){
 
              include "Update_karyawan.php";
 
       }else if($p=="create-freeday"){
 
              include "form_libur.php";
 
       } else if($p=="Delete-Karyawan"){
 
              include "Del_Karyawan.php";
 
       } else if($p=="edit-schedule"){
 
              include "update_libur.php";
 
       }else if($p=="Laporan-perbulan"){
 
              include "Report_perbulan.php";
 
       }else if($p=="Laporan-perkaryawan"){
 
              include "Report_perkaryawan.php";
 
       }
	   
	   
 
?>
                    </div>
                </div>
                 <!-- /. ROW  -->
              
               
           
           
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo $media;?>/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo $media;?>/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
 
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo $media;?>/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $media;?>/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
   
     <link rel="stylesheet" href="<?php echo $media;?>/datepicker/css/datepicker.css">
	
  
<script src="<?php echo $media;?>/datepicker/js/bootstrap-datepicker.js"></script>

       <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#tgl1,#tgl2').datepicker({
                    format: "yyyy-mm-dd",
					autoclose: true,
 					todayHighlight: true
                });  
            
            });
        </script>
    
   
</body>
</html>
