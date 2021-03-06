<?php
require_once './query-db.php';
require_once './config.php';
require_once './controller.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GreenLite Goal Setting</title>
    <link href="css/reset.css" type="text/css" rel="stylesheet" />
    <link href="css/fb-screen.css" type="text/css" rel="stylesheet" />
    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script src="js/jquery-1.5.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>
    <div id="wrapper">
      <?php include 'view-header.php'; ?> 
      <?php include 'view-main.php'; ?> 
      <div id="secondary" style="border:solid 1px">
        <?php include 'view-index-logout.php'; ?> 
        <br class="clear" />
      </div> <!-- end #secondary -->
    </div> <!-- end #wrapper -->
  </body>

</html>
