<?php
require '../config/config.php';
include '../config/authsession.php';
require '../config/simple_html_dom.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];

    // Crea un oggetto SimpleHTMLDOM dalla pagina
    $html = file_get_html($url);

    // Verifica se l'oggetto SimpleHTMLDOM è stato creato correttamente e se la pagina contiene i metadati desiderati
    if ($html && $html->find('title', 0) && $html->find('meta[name="description"]', 0)) {
        // Recupera il titolo e la descrizione dalla pagina
        $title = $html->find('title', 0)->plaintext;
        $description = $html->find('meta[name="description"]', 0)->content;

        // Salva i dati nel database
        $id = $_SESSION['id'];
        $data_pubblicazione = date('Y-m-d H:i:s');

        $query = "INSERT INTO notizia (id, id_utente, contenuto, data_pubblicazione) VALUES (NULL, '$id', '$url', '$data_pubblicazione')";

        if ($conn->query($query) === TRUE) {
            // La notizia è stata salvata
            header("Location: home.php");
            exit();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Search Notice</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="../style/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
<link rel="stylesheet" href="../Sidebar/style.css">
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
            <i class="fa-solid fa-chart-pie"></i>
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
          <a class="navigation-link" href="ricerca.php">
            <i class="fa-regular fa-newspaper"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Ricerca
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="fonti.html">
            <i class="fab fa-youtube"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Fonti
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="analytics.html">
            <i class="fa-regular fa-podcast"></i>
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

<!--/sidebar-->
<!-- partial:index.partial.html -->
<div class="container_read">
<!--    search  -->
      <form id="newsForm" method="POST" enctype="multipart/form-data" class='search-form_read'>
        <input type="text" name="url" id="textInput" class="search-bar_read" placeholder="url" pattern="https?://.+" required/>
        <div class='search-btn_read'>
          <button type='submit'>
            <i class="fa fa-search search_read"></i>
          </button>
        </div>
      </form>
<div class="article_read">

</div>
  </div>

</div>
</div>
<!-- partial:index.partial.html -->
<div id="large-header" class="large-header">
  <canvas id="demo-canvas"></canvas>
</div>

<!-- partial -->
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script><script  src="../script.js"></script>
<!-- partial -->
  <script src='https://raw.githubusercontent.com/kripken/speak.js/master/speakClient.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js'></script><script  src="../Sidebar/script.js"></script>
</body>
</html>
