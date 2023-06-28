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
            // La notizia è stata salvata correttamente
            echo "Notizia salvata nel database.";
        } else {
            // Si è verificato un errore durante il salvataggio della notizia
            echo "Errore durante il salvataggio della notizia: " . $conn->error;
        }
    } else {
        // La pagina non contiene i metadati desiderati, quindi mostra un messaggio di errore
        echo "L'URL fornito non corrisponde a una pagina contenente notizie.";
    }
}
?>

<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="../style/c.css">
  <link rel="stylesheet" href="../style/navbar.css">
  <link rel="stylesheet" href="../style/ricerca.css">
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <div class="navbar">
    <a class="active" href="#">Home</a>
    <a href="ricerca.php">ricerca notizie</a>
    <a href="social.php">Social</a>
    <a href="image_anl.php">image analyzer</a>
  </div>

  <!------- container per fact check ------------------------------------------------->
  <div class="container">
    <?php echo $_SESSION["username"]; ?>
    <h2>Fact check</h2>
    <img src="../images/fc.jpg" alt="logo" id="logo">
    <form id="newsForm" method="post" enctype="multipart/form-data">
      <input type="text" id="textInput" name="url" placeholder="Enter image URL" pattern="https?://.+" required>
      <input type="submit" value="Check" class="btn-check">
    </form>
  </div>
  <button id="showNewsButton">
    Mostra Notizie
  </button>
  <div class="">
      <div id="newsSection"></div>
  </div>
  <button  id="mostraNotizieV"> NEWS VERIFICATE</button>
  <div class="">
      <div id="newsSectionV"></div>
  </div>



  <!--<a href="logout.php">logout</a>
  <!------- fine container per fact check ------------------------------------------------
  <footer>made by webeet</footer>-->
  <script src="../js/navbar.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/feed.js" charset="utf-8"></script>
  <script src="../js/error.js" charset="utf-8"></script>
  <script src="../js/feedverificate.js" charset="utf-8"></script>
  <!--<script type="text/javascript">
  $(window).on('load', function() {
    // Aggiungi una pausa di 500 millisecondi (mezzo secondo) prima di simulare il click
    setTimeout(function() {
      $('#showNewsButton').trigger('click');
    }, 500);
  });
</script>-->

</body>
</html>
