<?php
require '../config/config.php';
include '../config/authsession.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link rel="shortcut icon" href="../Logo/Fact_check_favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
    <link rel="stylesheet" href="../Sidebar/style.css">
    <link rel="stylesheet" href="../style/analytics.css">
    
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
      <a class="navigation-logo" href="../index.php">

        <img src="../Logo/Fact_check_logo2.svg" style="height: 100px;">
      </a>

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
        <i class="fa-solid fa-barcode"></i>
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
        <a class="navigation-link" href="#">
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

  <div class="analytics">
    <div class="analytics-content">
  <h1>Come lavoriamo - Fact Check Engine</h1>
  <hr class="divider">
  <h2>Processo di verifica</h2>
  <p>Il nostro sistema, il Fact Check Engine, utilizza personale selezionato e addestrato per effettuare il fact-checking e valutare la veridicità delle notizie. Ecco come funziona:</p>

  <p>Riceviamo una notizia da verificare.</p>
<p>Avviamo il processo di verifica incrociando le informazioni fornite con una vasta gamma di fonti affidabili e verificate, tra cui giornali, pubblicazioni accademiche, report governativi e altre risorse autorevoli.</p>
<p>Utilizziamo il pensiero critico per analizzare attentamente l'evidenza disponibile, valutando la provenienza della notizia, la credibilità delle fonti citate, la coerenza con altre fonti affidabili e la presenza di prove concrete o elementi contraddittori.</p>
<p>Seguiamo metodi di verifica standardizzati e protocolli rigorosi per garantire un processo affidabile ed equo.</p>
<p>Consideriamo eventuali conflitti di interesse e lavoriamo in modo indipendente e imparziale per fornire una valutazione accurata.</p>

<h2>Missione</h2>
<p>La nostra missione è quella di offrire informazioni basate sui fatti e contribuire a contrastare la diffusione di notizie false o fuorvianti.</p>

<h2>Obiettivi</h2>
<p>Fornire una valutazione obiettiva ed equa sulla veridicità delle notizie.</p>
<p>Aiutare le persone a prendere decisioni informate sulla base dei fatti.</p>
<p>Contrastare la diffusione di notizie false o fuorvianti.</p>


  <h2>Impegno all'imparzialità</h2>
  <p>Teniamo conto di eventuali conflitti di interesse e lavoriamo in modo indipendente e imparziale per garantire una valutazione accurata delle notizie.</p>

  <h2>Fonti e protocolli di verifica</h2>
  <p>Utilizziamo una vasta gamma di fonti affidabili e verificate, tra cui giornali, pubblicazioni accademiche, report governativi e altre risorse autorevoli. Seguiamo metodi di verifica standardizzati e protocolli rigorosi per garantire un processo affidabile ed equo.</p>

  <h2>Contributi alla comunità</h2>
  <p>Siamo impegnati a fornire informazioni basate sui fatti e contribuire alla lotta contro la disinformazione. Vogliamo aiutare le persone a navigare in un panorama mediatico complesso e prendere decisioni informate sulla base di informazioni accurate.</p>
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
</body>
</html>
