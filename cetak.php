	<meta charset="utf-8">
    <title>simpeang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="template/img/sjt.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="template/img/sjt.ico">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="template/img/sjt.ico">
                    <link rel="apple-touch-icon-precomposed" href="template/img/sjt.ico">
                                   <link rel="shortcut icon" href="template/img/sjt.ico">

<?php  
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
  
  	session_start(); //kuncinya ada disini, tulis diawal script sebelum menulis yang lain 


                  
        if (@$_GET["page"]=="cetak") {
            include "data/cetak/index.php";
        } else {
            echo "error";
        } 
?>