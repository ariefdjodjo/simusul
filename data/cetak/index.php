<head>
  <link rel="stylesheet" type="text/css" href="template/print.css">
</head>

    <?php
      include "config/db.config.php"; 
      include "config/tanggal.php";
 
      if (@$_GET["act"]=="") {
          include "data/sm/sm.depan.php";
      } elseif($_GET["act"]=="c_r_usul") { //add SM
          include "data/cetak/cetak.rekap.usulan.php";
      } elseif($_GET["act"]=="c_d_usul") { //add SM
          include "data/cetak/cetak.detail.usulan.php";
      } elseif($_GET["act"]=="c_r_m_usul") { //add SM
          include "data/cetak/cetak.rekap.usulan.manajemen.php";
      } 
    ?>

