<?php 
  if (@$_GET["user"]=="") {
      $log_user = "";
  } else {
      $log_user = $_GET["user"];
  } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="PA_PEA" >

    <!-- Le styles -->
    <link rel="icon" href="template/sjt.ico">
    <link href="template/bootstrap3/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #e4e4e4;
      }
      
      .hider {
      	max-width: 300px;
        padding: 10px 29px 10px;
        margin: 0 auto 5px;
        background-color: #eee;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }

      .form-signin {
        max-width: 400px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="template/bootstrap3/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="template/img/sjt.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="template/img/sjt.ico">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="template/img/sjt.ico">
                    <link rel="apple-touch-icon-precomposed" href="template/img/sjt.ico">
                                   <link rel="shortcut icon" href="template/img/sjt.ico">
  </head>
	
  <body>

    <div class="container">
      <div class="form-signin" align="center">
        <img src="template/SARDJITO LOGO.png" width="30%" height="250%">
        <h4><b>SISTEM INFORMASI MANAJEMEN<br>RENCANA USULAN BELANJA</b></h4>
      </div>
      <div class="form-signin">
        <form class="form-horizontal" method="post" action="log.login.php">
          <div class="form-group">
            <label class="control-label col-sm-3" for="username">Username</label>
              <div class="col-sm-7">
                <input type="text" id="username" name="username" value="<?=$log_user;?>" placeholder="Username" required>
              </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-3" for="username">Username</label>
              <div class="col-sm-7">
                <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="username"></label>
              <div class="col-sm-7">
                <button class="btn btn-primary" type="submit">Sign in</button>
              </div>
          </div>

        <br>
          <?php 
            if (@$_GET["user"]=="") {
               echo "";
            } else {
          ?>
              <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><i class="fa fa-warning"></i></strong> Username atau Password Salah.
              </div>
          <?php 
            } 
          ?>

        &copy; Sistem Informasi Manajemen Rencana Usulan RS
        <br>
        <img src="template/chrome.png" width="10%" height="50%">
        <b>Best View From Google Chrome</b>
      </form>
      </div>
     

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="template/bootstrap3/assets/js/jquery.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-transition.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-alert.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-modal.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-dropdown.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-scrollspy.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-tab.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-tooltip.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-popover.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-button.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-collapse.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-carousel.js"></script>
    <script src="template/bootstrap3/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
