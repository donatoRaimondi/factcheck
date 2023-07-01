<?php
require '../config/config.php';
include '../config/authsession.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- sidebar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
    <link rel="stylesheet" href="../Sidebar/style.css">
    <!--/sidebar -->
    <link rel="stylesheet" href="../style/analytics.css">
    <link rel="stylesheet" href="../style/media.css">
    <title></title>
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
        <a class="navigation-link" href="#">
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

  <!--/sidebar-->
    <div class="analytics">
      <div class="analytics-content">
        <?php

        // Query per ottenere i media dal database, ordinati per data di pubblicazione
        $sql = 'SELECT * FROM multimedia m JOIN utente ON id_utente=utente.id ORDER BY data_pubblicazione DESC';
        $result = $conn->query($sql);

        if ($result) {
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $username = $row['username'];
              $data = $row['data_pubblicazione'];
              $path = $row['contenuto'];
              $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
              $commento = $row['commento'];
              $esito = $row['esito'];
              echo '<p>Utente che ha richiesto il check: <strong style="font-weight: bold;">' . $username . '</strong></p>';
                echo '<p>Date: <strong style="font-weight: bold;">' . $data . '</strong></p>';
              echo '<p>Esito: <strong style="font-weight: bold;">' . ($esito !== null ? $esito : 'non ancora confermato') . '</strong></p>';
                echo '<p>Commento: <strong style="font-weight: bold;">' . ($commento !== null ? $commento : 'non ancora confermato') . '</strong></p>';
              // Verifica l'estensione del file per determinare come visualizzarlo
              if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                // Immagine
                echo '<div class="media">';
                echo '<img src="' . $path . '" alt="Media" width="250px" height="250px">';
                echo '</div>';
              } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
                // Video
                echo '<div class="media">';
                echo '<video src="' . $path . '" controls></video>';
                echo '</div>';
              } elseif (in_array($extension, ['mp3', 'wav'])) {
                // Audio
                echo '<div class="media">';
                echo '<audio src="' . $path . '" controls></audio>';
                echo '</div>';
              } else {
                // Tipo di file non supportato
                echo '<div class="media">';
                echo 'File non supportato: ' . $path;
                echo '</div>';
              }
              echo '<hr class="divider">';
            }

          } else {
            echo 'Nessun media trovato.';
          }
        } else {
          echo 'Si è verificato un errore durante l\'esecuzione della query.';
        }
        ?>

      </div>
    </div>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js'></script><script  src="../Sidebar/script.js"></script>
  </body>
</html>
