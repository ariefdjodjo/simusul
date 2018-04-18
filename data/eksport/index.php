		<?php
      include "config/db.config.php"; 
      include "config/tanggal.php";
  
      if (@$_GET["act"]=="") {
          include "data/sm/sm.depan.php";
      } elseif($_GET["act"]=="e_r_m_usul") { //add SM
          include "data/eksport/eksport.rekap.usulan.manajemen.php";
      } elseif($_GET["act"]=="e_d_m_usul") { //add SM
          include "data/eksport/eksport.detail.usulan.manajemen.php";
      } 
    ?>

