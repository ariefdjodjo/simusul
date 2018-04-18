<?php
session_start(); //kuncinya ada disini, tulis diawal script sebelum menulis yang lain

include "config/db.config.php";

/* Ambil variabel */
$user_id    = $_POST['username'];
$pass       = $_POST['password'];
$md5        = md5($pass);

/* Validasi */
$error = 0;
if( empty( $user_id ) || empty( $pass ) ) {
  echo 'Tidak boleh ada kolom yang kosong.<br>';
   $error++;
} else {
  $sql    = "SELECT * FROM mst_user WHERE username='$user_id'";
  $query  = mysqli_query($db, $sql);
  $row    = mysqli_fetch_row($query);

  if( $row[0] == "" ) {
    header("location:signin.php?user=$user_id&aa");
    $error++;
  } else {
    if( $row[3] != $md5 ) {
      header("location:signin.php?user=$user_id&bb");
      $error++;
    } else {
         /*Daftarkan ke server sbg variabel global*/
          /* session_register() Sebaiknya tdk digunakan (Deprecated Function)
          session_register( 'ID', 'PASS' );
          */
      $_SESSION['ID']         = $user_id;
      $_SESSION['PASS']       = $md5;
    } 
 
  }
}

if( $error == 0 ) {
   /* Redirect jika tidak ada error */
   header( 'Location:index.php?page=' );
   exit();
} else {
   header("location:signin.php?user=$user_id&$md5=$pass");
}
?>
