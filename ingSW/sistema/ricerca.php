<?php
require '../config/config.php';
include '../config/authsession.php';
require '../config/simple_html_dom.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ricerca Notizie</title>
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
    <link rel="stylesheet" href="../Sidebar/style.css">
    <link rel="stylesheet" href="../style/ricerca.css">
    <link rel="stylesheet" href="../style/feed.css">
    <link rel="stylesheet" href="../style/post.css">
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
            <a class="navigation-link" href="#">
              <i class="fa-solid fa-chart-pie"></i>
              <span class="navigation-link__name js_navigation-item-name">
                Analytics
              </span>
            </a>
          </li>
          <li>
            <a class="navigation-link" href="#">
              <i class="fas fa-images"></i>
              <span class="navigation-link__name js_navigation-item-name">
                Image analyzer
              </span>
            </a>
          </li>
          <li>
            <a class="navigation-link" href="#">
              <i class="fa-regular fa-newspaper"></i>
              <span class="navigation-link__name js_navigation-item-name">
                News analyzer
              </span>
            </a>
          </li>
          <li>
            <a class="navigation-link" href="#">
              <i class="fab fa-youtube"></i>
              <span class="navigation-link__name js_navigation-item-name">
                Video analyzer
              </span>
            </a>
          </li>
          <li>
            <a class="navigation-link" href="#">
              <i class="fa-regular fa-podcast"></i>
              <span class="navigation-link__name js_navigation-item-name">
                audio analyzer
              </span>
            </a>
          </li>
        </ul>
      </nav>
      <!--/sidebar-->
      <!-- LOGOUT -->

      <a class="navigation-link logout" href="#">
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
    <h1>Ricerca Notizie</h1>
    <div class="container_read">
  <form id="newsForm" method="get" class="search-form_read">
      <input type="text" name="searchTerm" id="textInput" class="search-bar_read" placeholder="Inserisci il termine di ricerca" required>
    <div class='search-btn_read'>
      <button type='submit'>
        <i class="fa fa-search search_read"></i>
      </button>
    </div>
  </form>
  <div class="article_read">

  </div>
    </div>

<div class="container_read">
    <?php


    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchTerm'])) {
        $searchTerm = $_GET['searchTerm'];

        // Query per ottenere le notizie dal database che corrispondono alla ricerca
        $sql = "SELECT n.*, u.username
        FROM notizia n
        JOIN utente u ON n.id_utente = u.id
        WHERE n.contenuto LIKE '%$searchTerm%'
        AND n.esito IS NOT NULL

        UNION

        SELECT n.*, u.username
        FROM notizia n
        JOIN utente u ON n.id_utente = u.id
        WHERE n.contenuto LIKE '%$searchTerm%'
        AND n.esito IS NULL
        AND NOT EXISTS (
          SELECT *
          FROM notizia
          WHERE contenuto = n.contenuto
          AND esito IS NOT NULL
        );";
        $result = $conn->query($sql);

        // Verifica se ci sono risultati dalla query
        if ($result->num_rows > 0) {
            // Loop attraverso i risultati e visualizza le anteprime dei contenuti
            while ($row = $result->fetch_assoc()) {
                $url = $row['contenuto'];
                $uname = $row['username'];
                $esito = $row['esito'];
                $date = $row['data_pubblicazione'];
                $commento =  $row['commento'];
                $urlComponents = parse_url($url);
                $source = $urlComponents['host'];
                // Verifica se l'URL è valido
                if (filter_var($url, FILTER_VALIDATE_URL)) {
                    // Carica il contenuto della pagina web utilizzando file_get_contents
                    $html = file_get_html($url);

                    // Crea un oggetto SimpleHTMLDom dal contenuto HTML
                    $dom = new simple_html_dom();
                    $dom->load($html);

                    // Estrai il titolo, la descrizione e l'immagine dalla pagina web
                    $title = $dom->find('title', 0)->plaintext;
                    $description = $dom->find('meta[name="description"]', 0)->getAttribute('content');
                    $image = '';

                    // Verifica se l'elemento immagine è presente nella pagina web
                    if ($dom->find('meta[property=og:image]', 0)) {
                        $image = $dom->find('meta[property=og:image]', 0)->getAttribute('content');
                    }

                    // Mostra le anteprime dei contenuti
                    echo '<div class="news">';
                    echo '<h2> Utente che ha richiesto il check: <strong style="font-weight: bold;">' . $uname . ' </strong></h2>';
                    echo '<p>Date: <strong style="font-weight: bold;">' . $date . '</strong></p>';
                    echo '<p>Esito: <strong style="font-weight: bold;"> ' . ($esito !== null ? $esito : 'non ancora confermato') . '</strong></p>';
                    echo '<p>Commento amministratore: <strong style="font-weight: bold;"> ' . ($commento !== null ? $commento : 'non ancora confermato') . '</strong></p>';
                    echo '<p>Fonte: <strong style="font-weight: bold;"> ' . $source . '</strong></p>';
                    echo '<div class="post">';
                    echo '<div class="post-image">';
                    echo '<img src="' . $image . '" alt="Preview Image">';
                    echo '</div>';
                    echo '<div class="post-content">';
                    echo '<h2 class="post-title">' . $title  . '</h2>';
                    echo '<p class="post-description">' . $description . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    /*echo '<div class="post">';
                    echo '<div class="post-image">';
                    echo '<p>Fonte: <strong style="font-weight: bold;"> ' . $source . '</strong></p>';
                    echo '<img src="' . $image . '" alt="Preview Image">';
                    echo '</div>';
                    echo '<div class="post-content">';
                    echo '<h3 class="post-title">' . $title . '</h3>';
                    echo '<p class="post-description">' . $description . '</p>';
                    echo '</div>';
                    echo '</div>';*/

                    // Libera la memoria dopo l'uso di SimpleHTMLDom
                    $dom->clear();
                } else {
                    // L'URL non è valido, mostra un messaggio di errore o ignora l'URL
                    echo 'URL non valido: ' . $url;
                }
            }
        } else {
            echo 'Nessuna notizia trovata.';
        }
    }
    ?>
      </div>
    <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script><script  src="../script.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js'></script><script  src="../Sidebar/script.js"></script>
    <script>
  document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    var formElement = document.getElementById('searchForm');
    var searchTerm = document.getElementById('textInput').value;

    // Hide the form
    formElement.style.display = 'none';

    // Perform the search using the searchTerm variable
    // ...

    // Display the search results or perform any other necessary actions
    // ...
  });
</script>

</body>
</html>
