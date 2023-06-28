<?php
require '../config/config.php';
include '../config/authsession.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../style/c.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/ricerca.css">
  </head>
  <body>
    <div class="sear">
    <div id="newsSection">
      <?php include 'feed.php'; ?>
    </div>
  </div>
  </body>
</html>
