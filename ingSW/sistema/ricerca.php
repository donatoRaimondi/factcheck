<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ricerca Notizie</title>
    <link rel="stylesheet" href="../style/ricerca.css">
</head>
<body>
    <h1>Ricerca Notizie</h1>
    <form method="get">
        <input type="text" name="searchTerm" placeholder="Inserisci il termine di ricerca" required>
        <button type="submit" id="bottone">Cerca</button>
    </form>

    <?php
    require '../config/config.php';
    require '../config/simple_html_dom.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['searchTerm'])) {
        $searchTerm = $_GET['searchTerm'];

        // Query per ottenere le notizie dal database che corrispondono alla ricerca
        $sql = "SELECT DISTINCT contenuto FROM notizia WHERE contenuto LIKE '%$searchTerm%'";
        $result = $conn->query($sql);

        // Verifica se ci sono risultati dalla query
        if ($result->num_rows > 0) {
            // Loop attraverso i risultati e visualizza le anteprime dei contenuti
            while ($row = $result->fetch_assoc()) {
                $url = $row['contenuto'];

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
                    echo '<div class="post">';
                    echo '<div class="post-image">';
                    echo '<img src="' . $image . '" alt="Preview Image">';
                    echo '</div>';
                    echo '<div class="post-content">';
                    echo '<h3 class="post-title">' . $title . '</h3>';
                    echo '<p class="post-description">' . $description . '</p>';
                    echo '</div>';
                    echo '</div>';

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
</body>
</html>
