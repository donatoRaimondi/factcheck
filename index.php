<?php
require 'config/configdb.php';
require 'config/config.php';
if (isset($_SESSION["id"])) {
    header('Location: sistema/home.php');
    exit();
}
 ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Webeet fact check engine</title>
  <link rel="shortcut icon" href="Logo/Fact_check_favicon.png">
  <link href='https://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'><link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="Sidebar/style.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
<link rel="stylesheet" href="new-button.css">
</head>
<body>
<!--sidebar-->

<div class="navigation-container" id="js_navigation-container">
  <div class="navigation-collapse-trigger">
    <span class="navigation-collapse-trigger__orb" id="js_navigation-collapse-trigger">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
        <polyline points="15 18 9 12 15 6"></polyline>
      </svg>
    </span>
  </div>
  <div class="navigation">
    <!-- LOGO -->
    <a class="navigation-logo" href="#">
      
      <img src="Logo/Fact_check_logo2.svg" style="height: 100px;">
    </a>

    <!-- NAVIGATION -->
    <nav role="navigation">
      <ul>
        <li>
          <a class="navigation-link" href="sistema/loginospite.php">
            <i class="fa-solid fa-person-circle-question"></i>
            <span class="navigation-link__name js_navigation-item-name">
                    Prova il sistema come ospite
            </span>
          </a>
        </li>
      </ul>
    </nav>

  </div>
</div>

<!--/sidebar-->
<!-- partial:index.partial.html -->
<div id="large-header" class="large-header">
  <canvas id="demo-canvas"></canvas>
</div>
<div class="logo">
  <img src="Logo/Fact_check_logo.svg" alt="logo">
</div>

<div class="button-container1">
  <button onclick="location.href='sistema/login.php'" class="button"><span class="span-button"></span>ACCEDI</button>
  <button onclick="location.href='sistema/registration.php'" class="button"><span class="span-button"></span>REGISTRATI</button>
</div>
<!-- partial -->
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script><script  src="script.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js'></script><script  src="Sidebar/script.js"></script>

</body>
</html>
