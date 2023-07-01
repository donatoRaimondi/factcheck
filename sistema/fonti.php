<?php
require '../config/config.php';
include '../config/authsession.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
    <link rel="stylesheet" href="../Sidebar/style.css">
    <link rel="stylesheet" href="../style/analytics.css">
    <style>
    body{
      background-image: url('../Sfondi/galaxy-night-panorama.jpg');
    }
    </style>
    <title>Fonti</title>
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
          <i class="fa-duotone fa-scanner-image"></i>
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
        <a class="navigation-link" href="#">
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

  <div class="analytics">
    <div class="analytics-content">



    <article class="articolo">
        <h1 class="articolo_titolo">Corriere della Sera</h1>
        <p class="articolo_corpo">Uno dei principali giornali italiani, noto per la sua ampiezza di copertura, il
            Corriere della Sera offre notizie, approfondimenti e analisi su una vasta gamma di argomenti nazionali e
            internazionali.</p>
        <p class="articolo_grado"><b>90% di affidabilità</b></p>
    </article>
    <hr class="divider"></hr>
    <article class="articolo">
        <h1 class="articolo_titolo">La Repubblica</h1>
        <p class="articolo_corpo">Un altro importante giornale italiano, La Repubblica fornisce una copertura
            giornalistica ampia e approfondita su politica, economia, cultura e altre tematiche. È riconosciuto per il
            suo giornalismo investigativo.</p>
        <p class="articolo_grado"><b>90% di affidabilità</b></p>
    </article>
    <hr class="divider"></hr>
    <article class="articolo">
        <h1 class="articolo_titolo">Rai News</h1>
        <p class="articolo_corpo">La piattaforma di notizie della RAI, l'emittente pubblica italiana, offre una
            copertura aggiornata e completa degli avvenimenti nazionali e internazionali. È una fonte affidabile per le
            ultime notizie.</p>
        <p class="articolo_grado"><b>85% di affidabilità</b></p>
    </article>
    <hr class="divider"></hr>
    <article class="articolo">
        <h1 class="articolo_titolo">Il Sole 24 Ore</h1>
        <p class="articolo_corpo">Un giornale italiano specializzato in economia, finanza e politica, Il Sole 24 Ore è
            una risorsa autorevole per analisi approfondite, reportage e notizie legate al mondo degli affari.</p>
        <p class="articolo_grado"><b>85% di affidabilità</b></p>
    </article>
    <hr class="divider"></hr>
    <article class="articolo">
        <h1 class="articolo_titolo">ANSA</h1>
        <p class="articolo_corpo">L'Agenzia Nazionale Stampa Associata (ANSA) è la più grande agenzia di stampa
            italiana. Fornisce notizie, reportage e aggiornamenti in tempo reale su una vasta gamma di argomenti, tra
            cui politica, cronaca, sport ed economia.</p>
        <p class="articolo_grado"><b>80% di affidabilità</b></p>
    </article>
    <hr class="divider"></hr>
    <aside class="info">
        <p class="info_corpo">Le percentuali di affidabilità sono stime approssimative basate sulla reputazione e
            sull'esperienza generale con queste fonti. È sempre consigliabile esercitare un pensiero critico e valutare
            diverse fonti per ottenere una visione più completa e obiettiva degli eventi.</p>
    </aside>
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
</body>
</html>
