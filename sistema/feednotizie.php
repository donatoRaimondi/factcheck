<?php
require '../config/config.php';
include '../config/authsession.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>feed notizie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
    <link rel="stylesheet" href="../Sidebar/style.css">
    <link rel="stylesheet" href="../style/feed.css">
    <link rel="stylesheet" href="../style/post.css">
    <link rel="stylesheet" href="../style/feed2.css">
  </head>
  <body>
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
          <img src="../Logo/Fact_check_logo2.svg" style="height: 100px;">
        </a>

        <!-- SEARCH -->
        <!--<div class="navigation-search">
          <input type="search" placeholder="search" class="navigation-search__input" />
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-search__icon">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </div>-->

        <!-- NAVIGATION -->
    <nav role="navigation">
      <ul>
        <li>
          <a class="navigation-link" href="home.php">
            <i class="fa-regular fa-house-chimney"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Home
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="feednotizie.php">
            <i class="fa-regular fa-newspaper"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Notizie
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="image_anl.php">
            <i class="fas fa-images"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Image Analyzer
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="get_media.php">
            <i class="fas fa-images"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Media
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="ricerca.php">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Ricerca
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="fonti.php">
            <i class="fa-solid fa-earth-americas"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Fonti
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="analytics.php">
            <i class="fa-solid fa-chart-pie"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Analytics
            </span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- LOGOUT -->


        <a class="navigation-link logout" href="logout.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-power">
            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
            <line x1="12" y1="2" x2="12" y2="12"></line>
          </svg>
          <span class="navigation-link__name js_navigation-item-name">
            Logout
          </span>
        </a>
      </div>
    </div>

    <div class="sear">
      <div class="sear-content">
      <!-- Contenuto del div -->
      <?php include 'feed.php'; ?>
    </div>
  </div>
  <!-- effetto -->
  </div>
  <div id="large-header" class="large-header">
    <canvas id="demo-canvas"></canvas>
  </div>
    <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script><script  src="../script.js"></script>
  <!-- /effetto -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js'></script><script  src="../Sidebar/script.js"></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script><script  src="../script.js"></script>
  </body>
</html>
